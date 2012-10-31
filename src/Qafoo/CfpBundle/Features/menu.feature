Feature: Menu structure
	The menu should display links for upcoming, ending and for creating new CFPs.

	Scenario: Menu link for upcoming CFPs
		Given I am on homepage
		Then I should see "Upcoming CFPs"

		When I follow "Upcoming CFPs"
		Then I should be on "/reminder/upcoming"

	Scenario: Menu link for ending CFPs
		Given I am on homepage
		Then I should see "Ending CFPs"

		When I follow "Ending CFPs"
		Then I should be on "/reminder/ending"

	Scenario: Menu link to create a new CFP
		Given I am on homepage
		Then I should see "Create new CFP …"

		When I follow "Create new CFP …"
		Then I should be on "/cfp/new"
