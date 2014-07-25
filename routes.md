#| Route | Method | Intention | Note |
| ----- | ------ | --------- | ---- |
| **Generic**
1. | / | get | homepage | only shown if not logged in |
| **Login**
| /login | get | login page |  |
| /login | post | login attempt | redirects to /dashboard on success, /login on failure |
| **All Users**
| /dashboard | get | homepage for users | displays upcoming events, available associations to view, teams available to manage, etc.  varies by type of user |
| /association/{id} | get | shows info about an association | page varies for type of user. members get advanced info, commissioners get a management page, non-members get basic info page |
| /schedule | get | shows all events for logged in user | filters will be available to filter by association, sport, team, display within timerange, etc.  page looks the same for all users, but available filters will vary |
| /profile | get | shows logged in users profile |  |
| /profile | post | sends updated profile to database | ajax call. no redirect |
| /user/{id} | get | shows user data |  |
| /event/{id} | get | shows data for particular event |  |
| /school/{id} | get | shows data about school | list of teams available |
| /team/{id} | get | shows data about team | team schedule available |
| **Official's Pages**
| /association/{id}/members | get | shows directory listing for association members | available only to association memebers |
| /blocks | get | shows calendar with blocks |  |
| /blocks | post | sends new block to database | ajax call. no redirect |
| **Commissioner pages**
| /association/{id}/members | get | shows directory listing for association members | available only to association memebers |
| /association/{id}/schedule | get | shows all events for an association | available only to commissioner |
| /association/{id} | post | updates association data |  |
| /event/{id} | post | modifies event. used for making assignments |
| /event/add | get | shows form for new event | available only to AD and commissioner |
| /event/add | post | sends new event to database | redirects to /event/{id} |
| **AD pages**
| /school/{id} | post | updates school data |  |
| /event/add | get | shows form for new event | available only to AD and commissioner |
| /event/add | post | sends new event to database | redirects to /event/{id} |
| /event/{id} | post | updates event information |  |
| /team/{id} | post | updates team information |  |
| **Coach pages**
| /team/{id} | post | updates team information |  |