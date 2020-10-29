// delete EVERYTHING
MATCH (n) DETACH DELETE n; 
// DROP & GREATE contrains

DROP  CONSTRAINT ON (pr:Process) ASSERT pr.GUID is UNIQUE;
CREATE CONSTRAINT ON (pr:Process) ASSERT pr.GUID is UNIQUE;
DROP  CONSTRAINT ON (st:Status) ASSERT st.GUID is UNIQUE;
CREATE CONSTRAINT ON (st:Status) ASSERT st.GUID is UNIQUE;
DROP  CONSTRAINT ON (or:Org) ASSERT or.GUID is UNIQUE;
CREATE CONSTRAINT ON (or:Org) ASSERT or.GUID is UNIQUE;
DROP  CONSTRAINT ON (pe:Person) ASSERT pe.GUID is UNIQUE;
CREATE CONSTRAINT ON (pe:Person) ASSERT pe.GUID is UNIQUE;
DROP  CONSTRAINT ON (ma:mail) ASSERT ma.GUID is UNIQUE;
CREATE CONSTRAINT ON (ma:mail) ASSERT ma.GUID is UNIQUE;
DROP  CONSTRAINT ON (ma:mail) ASSERT ma.mail is UNIQUE;
CREATE CONSTRAINT ON (ma:mail) ASSERT ma.mail is UNIQUE;
//Constrains GUID relationship!


// CREATE Process for Persons incl Status
	CREATE (pr:Process{ GUID: "d5533857-66ef-4377-8976-8404e995e0a7", Name:"Process for Managing Persons"})
		 -[:has_start_status {  GUID:randomUUID(), status: 'active'  } ]-> (st:Status { GUID: "f36aa4e6-7fba-41f6-a0c5-90ed0d3b97fa", Name:"new"});
	CREATE (st:Status { GUID: "9c1c8734-68cb-4203-8918-c4b4a0750de4", Name:"incomplete"});
	CREATE (st:Status { GUID: "8ec205d6-686c-4036-9c3e-666d2b9553bd", Name:"complete"});
	CREATE (st:Status { GUID: "8859f819-40fe-4d6e-9cb7-26d1ebcd458a", Name:"blocked"});
	CREATE (st:Status { GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298", Name:"verified"});
	CREATE (st:Status { GUID: "2a2ad23f-42b5-420a-9011-f9c28f31755d", Name:"inactive"});
	//set Relationships bteween status
		MATCH (s1:Status {GUID: "f36aa4e6-7fba-41f6-a0c5-90ed0d3b97fa"}) , (s2:Status {GUID: "f36aa4e6-7fba-41f6-a0c5-90ed0d3b97fa"}) CREATE (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "f36aa4e6-7fba-41f6-a0c5-90ed0d3b97fa"}) , (s2:Status {GUID: "9c1c8734-68cb-4203-8918-c4b4a0750de4"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "9c1c8734-68cb-4203-8918-c4b4a0750de4"}) , (s2:Status {GUID: "9c1c8734-68cb-4203-8918-c4b4a0750de4"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "9c1c8734-68cb-4203-8918-c4b4a0750de4"}) , (s2:Status {GUID: "8ec205d6-686c-4036-9c3e-666d2b9553bd"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "9c1c8734-68cb-4203-8918-c4b4a0750de4"}) , (s2:Status {GUID: "8859f819-40fe-4d6e-9cb7-26d1ebcd458a"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "8859f819-40fe-4d6e-9cb7-26d1ebcd458a"}) , (s2:Status {GUID: "9c1c8734-68cb-4203-8918-c4b4a0750de4"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "8859f819-40fe-4d6e-9cb7-26d1ebcd458a"}) , (s2:Status {GUID: "8859f819-40fe-4d6e-9cb7-26d1ebcd458a"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "8859f819-40fe-4d6e-9cb7-26d1ebcd458a"}) , (s2:Status {GUID: "8ec205d6-686c-4036-9c3e-666d2b9553bd"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "8859f819-40fe-4d6e-9cb7-26d1ebcd458a"}) , (s2:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "8ec205d6-686c-4036-9c3e-666d2b9553bd"}) , (s2:Status {GUID: "8ec205d6-686c-4036-9c3e-666d2b9553bd"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "8ec205d6-686c-4036-9c3e-666d2b9553bd"}) , (s2:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "8ec205d6-686c-4036-9c3e-666d2b9553bd"}) , (s2:Status {GUID: "8859f819-40fe-4d6e-9cb7-26d1ebcd458a"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) , (s2:Status {GUID: "8859f819-40fe-4d6e-9cb7-26d1ebcd458a"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) , (s2:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) , (s2:Status {GUID: "2a2ad23f-42b5-420a-9011-f9c28f31755d"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "8859f819-40fe-4d6e-9cb7-26d1ebcd458a"}) , (s2:Status {GUID: "2a2ad23f-42b5-420a-9011-f9c28f31755d"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
	
// CREATE Process for Mail incl Status
	CREATE (pr:Process{ GUID: "4f302aa1-4cb6-4b74-8310-75866c125733", Name:"Process for Managing Mailadresses"})
		 -[:has_start_status {  GUID:randomUUID(), status: 'active'  } ]-> (st:Status { GUID: "f321af27-f068-4396-9ce4-b1554c2f4af5", Name:"new"});
	CREATE (st:Status { GUID: "a4168b0b-874a-4e29-ad10-f99fedf5fe7d", Name:"blocked"});
	CREATE (st:Status { GUID: "e8ddcb30-2be6-4429-b731-7c10b5b803c7", Name:"verified"});
	CREATE (st:Status { GUID: "486227ad-4a9a-48c0-870d-0a25fa0ea585", Name:"inactive"});
	//set Relationships bteween status
		MATCH (s1:Status {GUID: "f321af27-f068-4396-9ce4-b1554c2f4af5"}) , (s2:Status {GUID: "f321af27-f068-4396-9ce4-b1554c2f4af5"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "f321af27-f068-4396-9ce4-b1554c2f4af5"}) , (s2:Status {GUID: "a4168b0b-874a-4e29-ad10-f99fedf5fe7d"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "a4168b0b-874a-4e29-ad10-f99fedf5fe7d"}) , (s2:Status {GUID: "e8ddcb30-2be6-4429-b731-7c10b5b803c7"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "a4168b0b-874a-4e29-ad10-f99fedf5fe7d"}) , (s2:Status {GUID: "486227ad-4a9a-48c0-870d-0a25fa0ea585"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "f321af27-f068-4396-9ce4-b1554c2f4af5"}) , (s2:Status {GUID: "e8ddcb30-2be6-4429-b731-7c10b5b803c7"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "e8ddcb30-2be6-4429-b731-7c10b5b803c7"}) , (s2:Status {GUID: "486227ad-4a9a-48c0-870d-0a25fa0ea585"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "e8ddcb30-2be6-4429-b731-7c10b5b803c7"}) , (s2:Status {GUID: "a4168b0b-874a-4e29-ad10-f99fedf5fe7d"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
	
// CREATE Process for Organisations
	CREATE (pr:Process{ GUID: "1587c4fc-4026-4dcf-912a-d3d843dd8402", Name:"Process for Managing Organisations"})
		 -[:has_start_status {  GUID:randomUUID(), status: 'active'  } ]-> (st:Status { GUID: "eca6ee02-405a-4553-b364-0461949a0ef2", Name:"new"});
	CREATE (st:Status { GUID: "64e2297b-f8bc-4e21-bb82-4adff358c6c5", Name:"active"});
	CREATE (st:Status { GUID: "2897e285-e4c1-4d59-b390-6fa84e53b79c", Name:"update"});
	CREATE (st:Status { GUID: "e1dad799-9198-4c94-bbbb-f7dfbbdcfc68", Name:"inactive"});
	//set Relationships bteween status
		MATCH (s1:Status {GUID: "eca6ee02-405a-4553-b364-0461949a0ef2"}) , (s2:Status {GUID: "eca6ee02-405a-4553-b364-0461949a0ef2"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "eca6ee02-405a-4553-b364-0461949a0ef2"}) , (s2:Status {GUID: "64e2297b-f8bc-4e21-bb82-4adff358c6c5"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "64e2297b-f8bc-4e21-bb82-4adff358c6c5"}) , (s2:Status {GUID: "2897e285-e4c1-4d59-b390-6fa84e53b79c"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "2897e285-e4c1-4d59-b390-6fa84e53b79c"}) , (s2:Status {GUID: "2897e285-e4c1-4d59-b390-6fa84e53b79c"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "64e2297b-f8bc-4e21-bb82-4adff358c6c5"}) , (s2:Status {GUID: "e1dad799-9198-4c94-bbbb-f7dfbbdcfc68"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);
		MATCH (s1:Status {GUID: "2897e285-e4c1-4d59-b390-6fa84e53b79c"}) , (s2:Status {GUID: "64e2297b-f8bc-4e21-bb82-4adff358c6c5"}) CREATE  (s1)-[:next_status {GUID:randomUUID(), status: 'active' }]-> (s2);

// CREATE Organisatiosn an relate to Process and current Status
	// MATCH (pr:Process) DETACH DELETE pr; 
	// ORG 
		MATCH (pr:Process {GUID: "1587c4fc-4026-4dcf-912a-d3d843dd8402"}) CREATE (pr)<-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-(or:Org { GUID: "e5771ed2-c90c-4248-8fe6-91344fc359d2", Name: "mITSM" });
		MATCH (or:Org { GUID: "e5771ed2-c90c-4248-8fe6-91344fc359d2"}) , (st:Status {GUID: "64e2297b-f8bc-4e21-bb82-4adff358c6c5"}) CREATE  (o)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	// ORG
		MATCH (pr:Process {GUID: "1587c4fc-4026-4dcf-912a-d3d843dd8402"}) CREATE (pr)<-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-(or:Org { GUID: "d4d70112-cc41-43d7-8753-27f10de6fc56", Name: "ICO" });
		MATCH (or:Org { GUID: "d4d70112-cc41-43d7-8753-27f10de6fc56"}) , (st:Status {GUID: "64e2297b-f8bc-4e21-bb82-4adff358c6c5"}) CREATE  (o)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	// ORG
		MATCH (pr:Process {GUID: "1587c4fc-4026-4dcf-912a-d3d843dd8402"}) CREATE (pr)<-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-(or:Org { GUID: "2c0377d0-0d86-42fa-92da-e5e87a0d7d45", Name: "ITEMO" });
		MATCH (or:Org { GUID: "2c0377d0-0d86-42fa-92da-e5e87a0d7d45"}) , (st:Status {GUID: "64e2297b-f8bc-4e21-bb82-4adff358c6c5"}) CREATE  (o)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	// ORG
		MATCH (pr:Process {GUID: "1587c4fc-4026-4dcf-912a-d3d843dd8402"}) CREATE (pr)<-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-(or:Org { GUID: "cca2d567-4745-42ef-b0c8-9be459dbfc61", Name: "PSW" });
		MATCH (or:Org { GUID: "cca2d567-4745-42ef-b0c8-9be459dbfc61"}) , (st:Status {GUID: "64e2297b-f8bc-4e21-bb82-4adff358c6c5"}) CREATE  (o)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	// ORG
		MATCH (pr:Process {GUID: "1587c4fc-4026-4dcf-912a-d3d843dd8402"}) CREATE (pr)<-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-(or:Org { GUID: "d5790a15-542d-4d8d-b97a-1cb549caa40e", Name: "TÜV SÜD" });
		MATCH (or:Org { GUID: "d5790a15-542d-4d8d-b97a-1cb549caa40e"}) , (st:Status {GUID: "64e2297b-f8bc-4e21-bb82-4adff358c6c5"}) CREATE  (o)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);

// CREATE Person an relate to Process and current Status, Org and Mail 
	// MATCH (pe:Person) DETACH DELETE pe; 
	CREATE (pe:Person { GUID: "607c5e7b-568b-4794-bfde-1fbfe6e6a707", FirstName:"Martin", LastName: "W" , Language: "de" })
	 -[:has_Mail { name: pe.FirstName + ' has E-Mail ' + ma.Name, status: "active" } ]-> (ma:Mail { GUID: "315a78e8-2159-413a-8a8-33c9c3601bb1", mail:"mw@test.de"});
	 MATCH (pe:Person { GUID: "607c5e7b-568b-4794-bfde-1fbfe6e6a707"}) , (or:Org { GUID: "e5771ed2-c90c-4248-8fe6-91344fc359d2"}) CREATE  (pe)-[:works_for {GUID:randomUUID(), status: 'active' }]-> (or); 
	 MATCH (pe:Person { GUID: "607c5e7b-568b-4794-bfde-1fbfe6e6a707"}) , (pr:Process{ GUID: "d5533857-66ef-4377-8976-8404e995e0a7"}) CREATE  (pe)-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-> (pr);
	 MATCH (pe:Person { GUID: "607c5e7b-568b-4794-bfde-1fbfe6e6a707"}) , (st:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) CREATE  (pe)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	 MATCH (ma:Mail { GUID: "315a78e8-2159-413a-8a8-33c9c3601bb1"}) , (st:Status {GUID: "e8ddcb30-2be6-4429-b731-7c10b5b803c7"}) CREATE  (ma)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	 MATCH (ma:Mail { GUID: "315a78e8-2159-413a-8a8-33c9c3601bb1"}) , (pr:Process {GUID: "4f302aa1-4cb6-4b74-8310-75866c125733"}) CREATE  (ma)-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-> (pr);
	 
	CREATE (pe:Person { GUID: "8ebcb8e6-78e8-4bcf-bf8c-abfd72a047a8", FirstName:"Stefan", LastName: "H" , Language: "de" })
	-[:has_Mail { name: pe.FirstName + ' has E-Mail ' + ma.Name, status: "active" } ]-> (ma:Mail { GUID: "3c8706b9-f4e2-4e36-be8e-4989b2e8e120", mail:"sh@test.de"});
	 MATCH (pe:Person { GUID: "8ebcb8e6-78e8-4bcf-bf8c-abfd72a047a8"}) , (or:Org { GUID: "e5771ed2-c90c-4248-8fe6-91344fc359d2"}) CREATE  (pe)-[:works_for {GUID:randomUUID(), status: 'active' }]-> (or);
	 MATCH (pe:Person { GUID: "8ebcb8e6-78e8-4bcf-bf8c-abfd72a047a8"}) , (pr:Process{ GUID: "d5533857-66ef-4377-8976-8404e995e0a7"}) CREATE  (pe)-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-> (pr);
	 MATCH (pe:Person { GUID: "8ebcb8e6-78e8-4bcf-bf8c-abfd72a047a8"}) , (st:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) CREATE  (pe)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	 MATCH (ma:Mail { GUID: "3c8706b9-f4e2-4e36-be8e-4989b2e8e120"}) , (st:Status {GUID: "e8ddcb30-2be6-4429-b731-7c10b5b803c7"}) CREATE  (ma)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	 MATCH (ma:Mail { GUID: "3c8706b9-f4e2-4e36-be8e-4989b2e8e120"}) , (pr:Process {GUID: "4f302aa1-4cb6-4b74-8310-75866c125733"}) CREATE  (ma)-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-> (pr);
	 
	CREATE (pe:Person { GUID: "eeedcba-68ea-4ccb-a9cc-6a6b442cb6c4", FirstName:"Rob", LastName: "K" , Language: "de" })
	-[:has_Mail { name: pe.FirstName + ' has E-Mail ' + ma.Name, status: "active" } ]-> (ma:Mail { GUID: "97341132-6601-4463-a60c-9bce9cc15ba4", mail:"rk@test.de"});
	MATCH (pe:Person { GUID: "eeedcba-68ea-4ccb-a9cc-6a6b442cb6c4"}) , (or:Org { GUID: "d4d70112-cc41-43d7-8753-27f10de6fc56"}) CREATE  (pe)-[:works_for {GUID:randomUUID(), status: 'active' }]-> (or);
	MATCH (pe:Person { GUID: "eeedcba-68ea-4ccb-a9cc-6a6b442cb6c4"}) , (pr:Process{ GUID: "d5533857-66ef-4377-8976-8404e995e0a7"}) CREATE  (pe)-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-> (pr);
	MATCH (pe:Person { GUID: "eeedcba-68ea-4ccb-a9cc-6a6b442cb6c4"}) , (st:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) CREATE  (pe)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	MATCH (ma:Mail { GUID: "97341132-6601-4463-a60c-9bce9cc15ba4"}) , (st:Status {GUID: "e8ddcb30-2be6-4429-b731-7c10b5b803c7"}) CREATE  (ma)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	MATCH (ma:Mail { GUID: "97341132-6601-4463-a60c-9bce9cc15ba4"}) , (pr:Process {GUID: "4f302aa1-4cb6-4b74-8310-75866c125733"}) CREATE  (ma)-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-> (pr);
	 
	CREATE (pe:Person { GUID: "94ca0799-dbdd-41af-91a5-9e7d01ef3c42", FirstName:"Isabelle", LastName: "A" , Language: "de" })
	-[:has_Mail { name: pe.FirstName + ' has E-Mail ' + ma.Name, status: "active" } ]-> (ma:Mail { GUID: "5baabffb-bd4e-4283-8cd2-d7802377817d", mail:"ia@test.de"});
	MATCH (pe:Person { GUID: "94ca0799-dbdd-41af-91a5-9e7d01ef3c42"}) , (or:Org { GUID: "e5771ed2-c90c-4248-8fe6-91344fc359d2"}) CREATE  (pe)-[:works_for {GUID:randomUUID(), status: 'active' }]-> (or);
	MATCH (pe:Person { GUID: "94ca0799-dbdd-41af-91a5-9e7d01ef3c42"}) , (pr:Process{ GUID: "d5533857-66ef-4377-8976-8404e995e0a7"}) CREATE  (pe)-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-> (pr);
	 MATCH (pe:Person { GUID: "94ca0799-dbdd-41af-91a5-9e7d01ef3c42"}) , (st:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) CREATE  (pe)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	MATCH (ma:Mail { GUID: "5baabffb-bd4e-4283-8cd2-d7802377817d"}) , (st:Status {GUID: "e8ddcb30-2be6-4429-b731-7c10b5b803c7"}) CREATE  (ma)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	MATCH (ma:Mail { GUID: "5baabffb-bd4e-4283-8cd2-d7802377817d"}) , (pr:Process {GUID: "4f302aa1-4cb6-4b74-8310-75866c125733"}) CREATE  (ma)-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-> (pr);
	
	CREATE (pe:Person { GUID: "c988b337-868e-4193-a323-db7ed5e2e719", FirstName:"Mirella", LastName: "H" , Language: "de" })
	-[:has_Mail { name: pe.FirstName + ' has E-Mail ' + ma.Name, status: "active" } ]-> (ma:Mail { GUID: "f11049d3-b9d1-4763-b914-9576bf53dcbb", mail:"ia@test.de"});
	MATCH (pe:Person { GUID: "c988b337-868e-4193-a323-db7ed5e2e719"}) , (or:Org { GUID: "d4d70112-cc41-43d7-8753-27f10de6fc56"}) CREATE  (pe)-[:works_for {GUID:randomUUID(), status: 'active' }]-> (or);
	MATCH (pe:Person { GUID: "c988b337-868e-4193-a323-db7ed5e2e719"}) , (pr:Process{ GUID: "d5533857-66ef-4377-8976-8404e995e0a7"}) CREATE  (pe)-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-> (pr);
	MATCH (pe:Person { GUID: "c988b337-868e-4193-a323-db7ed5e2e719"}) , (st:Status {GUID: "798ceeea-4ba1-4bf8-9310-0f2453c33298"}) CREATE  (pe)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	MATCH (ma:Mail { GUID: "f11049d3-b9d1-4763-b914-9576bf53dcbb"}) , (st:Status {GUID: "e8ddcb30-2be6-4429-b731-7c10b5b803c7"}) CREATE  (ma)-[:current_status {GUID:randomUUID(), status: 'active' }]-> (st);
	MATCH (ma:Mail { GUID: "f11049d3-b9d1-4763-b914-9576bf53dcbb"}) , (pr:Process {GUID: "4f302aa1-4cb6-4b74-8310-75866c125733"}) CREATE  (ma)-[:managed_by_process {GUID:randomUUID(), status: 'active' }]-> (pr);
	
	//Match (pe:Person{GUID: "607c5e7b-568b-4794-bfde-1fbfe6e6a707"})-[r*1..2]->(d) Return pe, r, d
	//Match (pe:Person{GUID: "c988b337-868e-4193-a323-db7ed5e2e719"})-[r*1..2]->(d) Return pe, r, d
	//Match (pe:Person{GUID: "c988b337-868e-4193-a323-db7ed5e2e719"})-[r*1..3]->(d) where NONE( rel in r WHERE type(rel)="managed_by_process" OR type(rel)="next_status" OR rel.status = 'inactive') Return pe, r, d



MATCH (pe:Person {FirstName: "Martin"}), (or:Org {Name: "mITSM"}) CREATE (p)-[:member_of { name: pe.FirstName + ' is member of ' + or.Name, status: "active" }]->(o);

MATCH (pe:Person {FirstName: "Stefan"}), (or:Org {Name: "mITSM"}) CREATE (p)-[:member_of { name: pe.FirstName + ' is member of ' + or.Name, status: "active" }]->(o);

MATCH (pe:Person {GUID: "97341132-6601-4463-a60c-9bce9cc15ba4"}), (or:Org {Name: "mITSM"}) CREATE (p)-[:member_of { name: pe.FirstName + ' is member of ' + or.Name, status: "inactive" }]->(o);

MATCH (pe:Person {LastName: "K"}), (or:Org {Name: "mITSM"}) CREATE (p)-[:owner_of { name: pe.FirstName + ' is owner of ' + or.Name, status: "inactive" }]->(o);