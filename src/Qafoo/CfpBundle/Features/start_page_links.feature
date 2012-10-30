Feature: Links on start page
	On the start page there should be links to upcoming and ending CFP list.

	Scenario:
		Given I am on homepage
		Then I should see "Upcoming ones"
		And I should see "Ending ones"
