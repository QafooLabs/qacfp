Feature: The menu allows to see upcoming, ending and to create a new CFP
	From the menu I want to go to the list of upcoming and ending CFPs
	and I want to be able to create a new CFP.

	Scenario: There is a menu link for upcoming CFPs
		Given I am on homepage
		Then I should see "Upcoming CFPs"

		When I follow "Upcoming CFPs"
		Then I should be on "/reminder/upcoming"

	Scenario: There is a menu link for ending CFPs
		Given I am on homepage
		Then I should see "Ending CFPs"

		When I follow "Ending CFPs"
		Then I should be on "/reminder/ending"

	Scenario: There is a menu link for creating a new CFP
		Given I am on homepage
		Then I should see "Create new CFP …"

		When I follow "Create new CFP …"
		Then I should be on "/cfp/new"
