| Route | Method | Intention | Note |
| ----- | ------ | --------- | ---- |
| generic
| / | get | homepage | only shown if not logged in |
| login 
| /login | get | login page |  |
| /login | post | login attempt | redirects to /dashboard on success, /login on failure |
| /dashboard | get | homepage for users | displays upcoming events, available associations to view |
| /association/{assoc_id} | get | shows info about an association | page varies for type of user. members get advanced info, commissioners get a management page, non-members get basic info page |
| /association/{id}/members | get | shows directory listing for association members | available only to association memebers |
| /association/{id}/schedule | shows all events for an association | available only to commissioner |
| /schedule | get | shows all events for logged in user | filters will be available to filter by association, display within timerange, etc |
| /blocks | get | shows calendar with blocks |  |
| /blocks | post | sends new block to database | ajax call. no redirect |
| /event/{id} | get | shows data for particular event |  |
| /event/add | get | shows form for new event | available only to AD and commissioner |
| /event/add | post | sends new event to database | redirects to /event/{id} |
| /user/{id} | get | shows user data |  |
| /profile | get | shows logged in users profile |  |
| /profile | post | sends updated profile to database | ajax call. no redirect |