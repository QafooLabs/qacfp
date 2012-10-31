Feature: The CFPs in the database sgould be listed
	There should be a page where all stored CFPs are listed.

	Scenario: If there are no CFPs stored, I don't see CFPs.
		Given there are no CFPs
		When I view "CFP listing"
		Then I see 0 CFPs

	Scenario: If there are some CFPs stored, I see them listed.
		Given there are CFPs:
			| Conference Name | URL |
			| Confoo          | http://confoo.ca/cfp |
			| IPC             | http://phpconference.com/papers |
		When I view "CFP listing"
		Then I see 2 CFPs
