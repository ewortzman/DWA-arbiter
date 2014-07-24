##User:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| name | varchar |  |
| address | varchar |  |
| email | varchar |  |
| phone | varchar |  |

##Association:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| name | varchar |  |
| sport | int | fk->Sport.id |

##UserRole:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| user_id | int | fk->User.id |
| assoc_id | int | fk->Association.id |
| role | enum | perhaps make a table for roles |

**Note** coaches likely have a null assoc_id

Sport:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
	id (pk)			#int
	name				#varchar

School:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
	id (pk)			#int
	name				#varchar
	address			#varchar
	AD (fk to User.id)	#int

Team:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
	id (pk)			#int
	sport (fk)	#int
	school (fk)	#int
	name				#varchar
	level				#varchar

Event:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
	id (pk)			#int
	sport (fk)	#int
	location		#varchar
	type				#varchar (maybe enum)

EventTeam:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
	event_id (fk)	#int
	team_id (fk)	#int
	home/away 		#boolean

	# note: this allows multi-team events, such as tournaments

Block

| Column name | Type | Notes |
| ----------- | ---- | ----- |
	user_id (fk)	#int
	start					#datetime
	end						#datetime
	note					#varchar