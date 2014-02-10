Feature: Start page contains links to upcoming and ending CFPs
	From the start page I want go directly to upcoming and ending CFPs.

	Scenario: Text links for upcoming and ending CFPs are available
		Given I am on homepage
		Then I should see "Upcoming ones"
		And I should see "Ending ones"
