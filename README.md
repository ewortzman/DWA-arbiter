#Arbiter knockoff

Facilitate the creationg of sports leagues, manage schedules, and allow assigning of officials.  system should allow athletic directors to set their schedules, commissioners to assign officials, and officials to accept/reject the assignments

###Essential Features:
* AD/Coach
  - create teams
    + designate sport, gender (boys, girls, coed), level (fresh, JV, varsity), team name
    + all teams are bound to a specific school
  - set schedules
  	+ must designate opponent(s) from the list of existing teams

* Commissioner
	- view team schedules
	- assign officials to events
	- designate fees for events

* Official
	- view current assignments
	- accept/decline assignments
	- request turn-backs

###Advanced Features
* Calendar implementation
	- export Officials and team schedules to CSV files
	- include Google calendar
* Email support
	- notify officials upon new assignment/assignment change
	- notify AD when his team is involved in an event created by another AD
	- provide Commissioner with Daily Digest emails
* Post-game information
	- track scores, stats, and other game data after the game
* History
	- allow officials to review their histories with other officials.  Allow coaches/ADs to review history against other teams
	- view stats on previous seasons.  allow comparing previous seasons to current season
