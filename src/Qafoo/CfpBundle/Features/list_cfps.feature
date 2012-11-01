Feature: The existing CFPs should be listed
	As a visitor I want to get a listing of all existing CFPs.

	Scenario: If there are no CFPs, I see an empty list.
		Given there are no CFPs
		When I view "CFP Listing"
		Then I see 0 CFPs listed

	Scenario: If there are some CFPs stored, I see them listed.
		Given there are the following CFPs:
			| Conference Name | URL |
			| Confoo          | http://confoo.ca/cfp |
			| IPC             | http://phpconference.com/papers |
		When I view "CFP Listing"
		Then I see 2 CFPs listed
