#THIS APP DOES NOT WORK!!!

a live link is located here: http://arbiter-ewortzman.herokuapp.com

##Things that work:

* Registration
	* Registration sends an email, but it turns out that users don't need to be verified to log in. never investigated that, but it's probably a simple filter.
*viewing schedule
*commissioners assigning officials to events
	*officials are alerted by email when they are assigned to a new event
	*there is a graphical bug when assigning 2 officials to an event without reloading the page, but functionally it works fine.  just ignore the extra text boxes.
*viewing event details
*joining an existing association
*creating a new association

##Things that do not work
*creating a new school <-this one issue breaks the whole app

##Things that are not implemented
*officials accepting/declining assignments
*creating a new event
*all intended AD functionality

I have included a seeded database, so that the functions that do work can be used.

There is **absolutely no validation of any kind**.  If some input is invalid, it's just going to crash.

My original intent for this app can be viewed a README.md.bak.
