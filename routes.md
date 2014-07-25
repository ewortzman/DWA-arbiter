| Route | Method | Intention | Note |
| ----- | ------ | --------- | ---- |
| / | get | homepage | only shown if not logged in |
| /login | get | login page |  |
| /login | post | login attempt |  |
| /dashboard | get | homepage for users | displays upcoming events, available associations to view |
| /dashboard/{assoc_id} | get | displays page for user within association |  |
| /schedule | get | shows all events for logged in user | filters will be available to filter by association, display within timerange, etc |
| /blocks | get | shows calendar with blocks |  |
| /blocks | post | sends new block to database | ajax call. no redirect |
| /event/{id} | get | shows data for particular event |  |
