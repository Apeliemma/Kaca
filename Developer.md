## KACA SIMS Project Details

SIMS: Store Integrated Management system


Admin Template used:
[Front Admin Template](https://htmlstream.com/preview/front-dashboard-v2.1.1/)

Theme used: default theme icons

User Roles in the system: MO, Technician, OC, QM
- Mo- Maintenance officer
- Oc - Officer Commanding
- QM - Quota Master
- ASSD - Aviation supply sub depo
- SRS - Stock Record Sheet
- rov - Record of Voucher 

The records for EntryType in Record_of_vouchers table is
- ivtech: issues to technician
- rvtech: items technician have received
- rv: item received from supplier
- iv: item issued to supplier
- rvstore: item received from store
- ivstore: item issued to store


Stocks issued by technician has Aircraft_id while from supplier lacks

Stock received from supplier must have supplier_id as some stocks lacks LPO and are imported from Overseas


###  Setup Process
- Import Permission group data from sql file
- import stores data
- import users
- 


- Store interacts with spare parts through store parts table

- Store QM should have the store_qm role attached
- To Understand about status look for StatusRepository file

- Once a quantity is requested by technician it is stored in quantity requested, after approval by MO is when the quantity is set as at times quantity requested might be less than what we have in store and MO can decide if requisition proceeds or rejects... if proceeds, quantity is set to what exists in store


## KACA Deployment Environment
------------------------------------------------------------
- Installed in Windows Server 2016
- Ensure you have web.config within public directory as it is under IIS server
- Host machine password: Password@2020
- Hypervisor password: Root@1234
- installed under c:\inetpub\wwwroot\kaca



