CREATE VIEW tempNote AS 
(
SELECT user.userID as filteruser, note.noteID, note.userID as noteuser
FROM user join note on user.userID=note.userID
			join schedule on note.nsID=schedule.sID 
			join current on user.userID=current.userID
WHERE  (date(current.cTime) BETWEEN schedule.startDate AND schedule.endDate) AND (time(current.cTime) BETWEEN schedule.startTime AND schedule.endTime) 
                AND ((repetition="no" AND date(current.cTime) = schedule.startDate) OR repetition="daily" OR (repetition="weekly"  AND current.cWeekday = schedule.weekday) OR (repetition="monthly" AND day(current.cTime) = day(schedule.startDate)) OR (repetition="yearly" AND month(current.cTime) = month(schedule.startDate)))
                #AND (SQRT(POW(current.cLatitude,2) + POW(current.cLongitude,2)) - SQRT(POW(note.nLatitude,2) + POW(note.nLongitude,2))) <= note.radius
                AND (ACOS( COS(RADIANS(current.cLatitude)) * COS(RADIANS(note.nLatitude)) * COS(RADIANS(note.nLongitude) - RADIANS(current.cLongitude)) + SIN(RADIANS(current.cLatitude)) * SIN(RADIANS(note.nLatitude)) )*3961) < note.radius
				AND (note.nRestrict="all" OR (note.nRestrict="self" AND note.userID=user.userID) OR (note.nRestrict="friend" AND user.userID in (SELECT userID2 FROM friendship WHERE userID1=note.userID)))
)

CREATE VIEW tempFilter AS 
(
SELECT filter.userID as filteruser, note.noteID, note.userID as noteuser
FROM filter join note #on note.userID=filter.userID
			join schedule on filter.fsID=schedule.sID
			join current on filter.userID=current.userID 
WHERE  (date(current.cTime) BETWEEN schedule.startDate AND schedule.endDate) AND (time(current.cTime) BETWEEN schedule.startTime AND schedule.endTime) 
                AND ((repetition="no" AND date(current.cTime) = schedule.startDate) OR repetition="daily" OR (repetition="weekly"  AND current.cWeekday = schedule.weekday) OR (repetition="monthly" AND day(current.cTime) = day(schedule.startDate)) OR (repetition="yearly" AND month(current.cTime) = month(schedule.startDate)))
                AND (ACOS( COS(RADIANS(filter.fLatitude)) * COS(RADIANS(note.nLatitude)) * COS(RADIANS(note.nLongitude) - RADIANS(filter.fLongitude)) + SIN(RADIANS(filter.fLatitude)) * SIN(RADIANS(note.nLatitude)) )*3961)< note.radius
				AND (filter.fRestrict="all" OR (filter.fRestrict="self" AND filter.userID=note.userID) OR (filter.fRestrict="friend" AND filter.userID in (SELECT userID2 FROM friendship WHERE userID1=note.userID)))
				AND (filter.apply="1")
)

WITH afterfilter AS 
(
SELECT noteID,filteruser
FROM tempNote, tempFilter
WHERE tempNote.filteruser=tempFilter.filteruser AND tempNote.noteuser=tempFilter.noteuser AND tempNote.noteID=tempFilter.noteID)
)
#不用with
SELECT tempNote.noteID,tempFilter.filteruser
FROM tempNote, tempFilter
WHERE tempNote.filteruser=tempFilter.filteruser AND tempNote.noteuser=tempFilter.noteuser AND tempNote.noteID=tempFilter.noteID

#4
SELECT *
FROM note join afterfilter on note.noteID=afterfilter.noteID
WHERE filteruser=1;

#4不用with
SELECT *
FROM (
SELECT tempNote.noteID as note,tempFilter.filteruser as user
FROM tempNote, tempFilter
WHERE tempNote.filteruser=tempFilter.filteruser AND tempNote.noteuser=tempFilter.noteuser AND tempNote.noteID=tempFilter.noteID
) afterfilter join note on note.noteID = afterfilter.note
WHERE afterfilter.user=2;


#5
SELECT afterfilter.filteruser
FROM note join afterfilter on note.noteID=afterfilter.noteID
WHERE note.noteID=5;

#5不用with
SELECT afterfilter.user
FROM note join (
SELECT tempNote.noteID as note,tempFilter.filteruser as user
FROM tempNote, tempFilter
WHERE tempNote.filteruser=tempFilter.filteruser AND tempNote.noteuser=tempFilter.noteuser AND tempNote.noteID=tempFilter.noteID
) afterfilter on note.noteID=afterfilter.note
WHERE note.noteID=5;

#6
SELECT *
FROM afterfilter join note on note.noteID=afterfilter.noteID
WHERE CONTAINS(note.nText, "food")

#6不用with
SELECT *
FROM (
SELECT tempNote.noteID as note,tempFilter.filteruser as user
FROM tempNote, tempFilter
WHERE tempNote.filteruser=tempFilter.filteruser AND tempNote.noteuser=tempFilter.noteuser AND tempNote.noteID=tempFilter.noteID
) afterfilter join note on note.noteID=afterfilter.note
WHERE afterfilter.user=2 AND CONTAINS(note.noteText,'food')

SELECT *
FROM (
SELECT tempNote.noteID as note,tempFilter.filteruser as user
FROM tempNote, tempFilter
WHERE tempNote.filteruser=tempFilter.filteruser AND tempNote.noteuser=tempFilter.noteuser AND tempNote.noteID=tempFilter.noteID
) afterfilter join note on note.noteID=afterfilter.note
WHERE note.noteText like'%food%'




#3
SELECT  f.userID2, u.userName
FROM friendship f join user u on f.userID2=u.userID
WHERE f.userID1=1;

