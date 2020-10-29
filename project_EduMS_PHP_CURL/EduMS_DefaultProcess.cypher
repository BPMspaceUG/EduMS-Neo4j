// CREATE Process for XXX (DEFAULT)
// MATCH (n) DETACH DELETE n; 
CREATE (pr:Process{ GUID: "PrPrPrPr", Name:"Process for Managing XXX"})
	 -[:has_start_status {GUID:randomUUID(), status: 'active' } ]-> (s:Status { GUID: "NewNewNewNew", Name:"new"});
CREATE (s:Status { GUID: "ActActActAct", Name:"actice"});
CREATE (s:Status { GUID: "UpdUpdUpdUpd", Name:"update"});
CREATE (s:Status { GUID: "InaInaInaIna", Name:"inactive"});
MATCH (s1:Status {GUID: "NewNewNewNew"}) , (s2:Status {GUID: "NewNewNewNew"}) CREATE  (s1)-[:next_status{GUID:randomUUID(), status: 'active' }]-> (s2);
MATCH (s1:Status {GUID: "NewNewNewNew"}) , (s2:Status {GUID: "ActActActAct"}) CREATE  (s1)-[:next_status{GUID:randomUUID(), status: 'active' }]-> (s2);
MATCH (s1:Status {GUID: "ActActActAct"}) , (s2:Status {GUID: "UpdUpdUpdUpd"}) CREATE  (s1)-[:next_status{GUID:randomUUID(), status: 'active' }]-> (s2);
MATCH (s1:Status {GUID: "UpdUpdUpdUpd"}) , (s2:Status {GUID: "UpdUpdUpdUpd"}) CREATE  (s1)-[:next_status{GUID:randomUUID(), status: 'active' }]-> (s2);
MATCH (s1:Status {GUID: "ActActActAct"}) , (s2:Status {GUID: "InaInaInaIna"}) CREATE  (s1)-[:next_status{GUID:randomUUID(), status: 'active' }]-> (s2);
MATCH (s1:Status {GUID: "UpdUpdUpdUpd"}) , (s2:Status {GUID: "ActActActAct"}) CREATE  (s1)-[:next_status{GUID:randomUUID(), status: 'active' }]-> (s2);