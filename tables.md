##User:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| name | varchar |  |
| address | varchar |  |
| email | varchar |  |
| phone | varchar | nullable |

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
| role | enum | nullable, perhaps make a table for roles |

**Note** coaches likely have a null assoc_id

##Sport:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| name | varchar |  |

##School:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| name | varchar |  |
| address | varchar |  |
| AD | int | fk->User.id |

##Team:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| sport | int | fk->Sport.id |
| school | int | fk->School.id |
| name | varchar |  |
| level | varchar | perhaps enum? |

##Event:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| sport | int | fk->Sport.id |
| location | varchar |  |
| type | varchar or enum |  |
| fee | float | initialized to 0 upon creation by AD, set later by Commish |

##EventTeam:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| event_id | int | fk->Event.id |
| team_id | int | fk->Team.id |
| home/away | boolean |  |

**Note** this allows multi-team events, such as tournaments

##Block:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| user_id | int | fk->User.id |
| start | datetime |  |
| end | datetime |  |
| note | varchar | nullable |