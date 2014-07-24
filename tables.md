User:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id          | int  | pk    |
| name        | varchar |  |
| address | varchar |  |
| email | varchar |  |
| phone | varchar |  |


| Tables        | Are           | Cool  |
| ------------- |:-------------:| -----:|
| col 3 is      | right-aligned | $1600 |
| col 2 is      | centered      |   $12 |
| zebra stripes | are neat      |    $1 |


Association:
	id (pk)			#int
	name				#varchar
	sport (fk)	#int

UserRole:
	user_id (fk)	#int
	assoc_id (fk)	#int
	role					#enum or varchar (maybe a fk)
	# note: coaches likely have a null assoc_id

Sport:
	id (pk)			#int
	name				#varchar

School:
	id (pk)			#int
	name				#varchar
	address			#varchar
	AD (fk to User.id)	#int

Team:
	id (pk)			#int
	sport (fk)	#int
	school (fk)	#int
	name				#varchar
	level				#varchar

Event:
	id (pk)			#int
	sport (fk)	#int
	location		#varchar
	type				#varchar (maybe enum)

EventTeam:
	event_id (fk)	#int
	team_id (fk)	#int
	home/away 		#boolean

	# note: this allows multi-team events, such as tournaments

Block
	user_id (fk)	#int
	start					#datetime
	end						#datetime
	note					#varchar