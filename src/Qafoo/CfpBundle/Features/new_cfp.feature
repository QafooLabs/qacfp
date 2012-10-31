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
		And I should see "You successfully submitted the CFP for the conference Example Conference."

	Scenario Outline: Creating a new CFP fails on invalid fields
		Given I am in form "new_cfp"

		When I fill in "Start" with "2020-10-31"
		And I fill in "End" with "2020-11-03"
		And I fill in "URL" with "http://example.com/cfp"
		And I fill in "Conference Name" with "Example Conference"
		And I fill in "Conference URL" with "http://example.com/conference"
		And I fill in "Conference Date" with "2021-03-23"

		And I fill in "<field>" with "<invalid>"
		And I press "Submit RFC"

		Then I should see "<message>"

		Examples:

			| field | invalid | message |
			| Start | 2010-10- | This value is not valid. |
			| End | 2010-10- | This value is not valid. |

	@javascript
	Scenario: A help button should clarify the role of the submit button.
		Given I am in form "new_cfp"

		When I fill in "Start" with "2020-10-31"
		And I fill in "End" with "2020-11-03"
		And I fill in "URL" with "http://example.com/cfp"
		And I fill in "Conference Name" with "Example Conference"
		And I fill in "Conference URL" with "http://example.com/conference"
		And I fill in "Conference Date" with "2021-03-23"

		And I follow "Help"
		And I wait for the help box to appear

		Then I should see "Please only click if you really want to submit a CFP"

