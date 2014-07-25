##users:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| email | varchar |  |
| name | varchar |  |
| address | varchar |  |
| password | varchar | encrypted |
| phone | varchar | nullable |
| experience | int | nullable |

##associations:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| name | varchar |  |
| sport | int | fk->sports.id |

##user_roles:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| user_id | int | fk->users.id |
| assoc_id | int | nullable, fk->associations.id |
| role | enum |  |

**Note** coaches likely have a null assoc_id

##sports:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| name | varchar |  |

##schools:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| name | varchar |  |
| address | varchar |  |
| AD | int | fk->users.id |

##teams:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| sport_id | int | fk->sports.id |
| school_id | int | fk->schools.id |
| name | varchar |  |
| level | varchar |  |
| coach | int | fk->users.id |

##events:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| id | int | pk |
| sport_id | int | fk->sports.id |
| location | varchar |  |
| type | varchar |  |
| start | datetime |  |
| end | datetime |  |
| fee | float | initialized to 0 upon creation by AD, set later by Commish |

##event_teams:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| event_id | int | fk->events.id |
| team_id | int | fk->teams.id |
| home | boolean |  |

**Note** this allows multi-team events, such as tournaments

##event_notes:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| event_id | int | fk->events.id |
| user_id | int | fk->users.id |
| note | text |  |

##block:

| Column name | Type | Notes |
| ----------- | ---- | ----- |
| user_id | int | fk->users.id |
| start | datetime |  |
| end | datetime |  |
| note | varchar | nullable |