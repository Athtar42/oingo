CREATE VIEW tempNote AS 
(
SELECT user.userID as filteruser, note.noteID, note.userID as noteuser
FROM user join note #on user.userID=note.userID
			join schedule on note.nsID=schedule.sID 
			join current on user.userID=current.userID
WHERE  (date(current.cTime) BETWEEN schedule.startDate AND schedule.endDate) AND (time(current.cTime) BETWEEN schedule.startTime AND schedule.endTime) 
                AND ((schedule.repetition="no" AND date(current.cTime) = schedule.startDate) OR schedule.repetition="daily" OR (schedule.repetition="weekly"  AND current.cWeekday = schedule.weekday) OR (schedule.repetition="monthly" AND day(current.cTime) = day(schedule.startDate)))
                #AND (SQRT(POW(current.cLatitude,2) + POW(current.cLongitude,2)) - SQRT(POW(note.nLatitude,2) + POW(note.nLongitude,2))) <= note.radius
                #AND DEGREES(ACOS( COS(RADIANS(current.cLatitude)) * COS(RADIANS(note.nLatitude)) * COS(RADIANS(note.nLongitude) - RADIANS(current.cLongitude)) + SIN(RADIANS(current.cLatitude)) * SIN(RADIANS(note.nLatitude)) ))*3961 < note.radius
                #AND (ACOS( COS(RADIANS(note.nLatitude)) * COS(RADIANS(current.cLatitude)) * COS(RADIANS(current.cLongitude) - RADIANS(note.nLongitude)) + SIN(RADIANS(note.nLatitude)) * SIN(RADIANS(current.cLatitude)) )*3961) < note.radius
				AND 6378.138 * 2 * ASIN(SQRT(POW(SIN((current.cLatitude*3.14/180-note.nLatitude*3.14/180)/2),2)+COS(current.cLatitude*3.14/180)*COS(note.nLatitude*3.14/180)*POW(SIN((current.cLongitude*3.14/180-note.nLongitude*3.14/180)/2),2)))*0.621 < note.radius
				AND (note.nRestrict="all" OR (note.nRestrict="self" AND note.userID=user.userID) OR (note.nRestrict="friends" AND user.userID in (SELECT userID2 FROM friendship WHERE userID1=note.userID)))
)

6378.138 * 2 * ASIN(SQRT(POW(SIN((current.cLatitude*3.14/180-note.nLatitude*3.14/180)/2),2)+COS(current.cLatitude*3.14/180)*COS(note.nLatitude*3.14/180)*POW(SIN((current.cLongitude*3.14/180-note.nLongitude*3.14/180)/2),2)))*0.621

CREATE VIEW tempFilter AS 
(
SELECT filter.userID as filteruser, note.noteID, note.userID as noteuser
FROM filter join note #on note.userID=filter.userID
			join schedule on filter.fsID=schedule.sID
			join current on filter.userID=current.userID 
			join state on filter.userID=state.userID
WHERE  (date(current.cTime) BETWEEN schedule.startDate AND schedule.endDate) AND (time(current.cTime) BETWEEN schedule.startTime AND schedule.endTime) 
                AND ((schedule.repetition="no" AND date(current.cTime) = schedule.startDate) OR schedule.repetition="daily" OR (schedule.repetition="weekly"  AND current.cWeekday = schedule.weekday) OR (schedule.repetition="monthly" AND day(current.cTime) = day(schedule.startDate)))
                AND 6378.138 * 2 * ASIN(SQRT(POW(SIN((filter.fLatitude*3.14/180-note.nLatitude*3.14/180)/2),2)+COS(filter.fLatitude*3.14/180)*COS(note.nLatitude*3.14/180)*POW(SIN((filter.fLongitude*3.14/180-note.nLongitude*3.14/180)/2),2)))*0.621 < note.radius
				#AND (ACOS( COS(RADIANS(filter.fLatitude)) * COS(RADIANS(note.nLatitude)) * COS(RADIANS(note.nLongitude) - RADIANS(filter.fLongitude)) + SIN(RADIANS(filter.fLatitude)) * SIN(RADIANS(note.nLatitude)) )*3961)< note.radius
				AND (filter.fRestrict="all" OR (filter.fRestrict="self" AND filter.userID=note.userID) OR (filter.fRestrict="friends" AND filter.userID in (SELECT userID2 FROM friendship WHERE userID1=note.userID)))
				AND (filter.apply="1") 
				AND (filter.fState = "default" OR filter.fState = state.state)

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

