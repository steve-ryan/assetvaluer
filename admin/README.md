SELECT r.report_id,r.date,v.reg_no,v.chassis_no,v.model,v.cost,b.name,t.name,a.name FROM report as r JOIN vehicle as v ON r.vehicle_id = v.vehicle_id JOIN assessor as a ON v.assessor_id = a.assessor_id JOIN brand as b ON v.brand_id = b.brand_id JOIN type as t ON v.type_id = t.type_id WHERE v.vehicle_id=56