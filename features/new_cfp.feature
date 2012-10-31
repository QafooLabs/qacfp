Feature: Create a new CFP
	As a user, I want to create a new CFP through a form

	Scenario: Create new CFP
		Given I am in form "new_cfp"
		Then I should see "Create a new CFP"

		When I fill in "Start" with "2020-10-31"
		And I fill in "End" with "2020-11-03"
		And I fill in "URL" with "http://example.com/cfp"
		And I fill in "Conference Name" with "Example Conference"
		And I fill in "Conference URL" with "http://example.com/conference"
		And I fill in "Conference Date" with "2021-03-23"
		And I press "Submit RFC"
		
		Then I should see "CFP submitted successfully"
