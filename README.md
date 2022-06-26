# medlife
Admin Login : username= med_admin    pass=1234
As previously mentioned the project is divided into 2 parts, a web application followed by its mobile application. The web application was created using Visual Studio Code, and the mobile application was done using React Native app development framework and run using Expo, which is a bundle of tools created around React Native to help you start an app very fast. Those 2 parts were done in parallel. We note that the mobile application doesn’t include the administration side. Hence, we only developed the necessary tools for both actors on the mobile application but on the web application, we have tried to implement the features in a way to make the user feel as if he was in a clinic. Therefore, we will start discussing the web application features then we will present the mobile application.

A web application, unlike computer-based software packages that are kept locally on the machine, is software that runs on a web server. The user uses a web browser with an internet - connected device to access web apps.
Starting with the MedLife Web application's home page. It comprises of a log in screen where you select the kind of user you are and then log in with your login details (Figure 6-6).
The following are the many categories of users you may choose from (Figure 6-5):
•	Admin 
•	Doctor 
•	Lab Tech 
•	Radio Tech 
•	Nurse





6.1.4.1. Admin Side:
After selecting Admin as the user type and logging in with username and password, the page will disclose the options accessible to MedLife web site admins, including the ability to examine the list of doctors (Figure 6-7), review their profiles (Figure 6-8), manage their schedules (Figure 6-9) and add (Figure 6-10) or delete doctors (Figure 6-11).

 
Figure ‎6 7. List of Doctors.
 
Figure ‎6 8. Doctor's Profile
 
Figure ‎6 9. Doctor's Schedule.

Figure ‎6 10. Add Doctor.










The admin is also in charge of managing the patients, since he may access the list of patients (Figure 6-12), read their medical files (Figure 6-13), and view the tests either lab or radio and the pending once (Figure 6-14), as well as add (Figure 6-15) and delete patients (Figure 6-16).
 
Figure ‎6 12. Patients List.
 
Figure ‎6 13. Patients Profile.









.
 
Figure ‎6 15. Add Patients.








Furthermore, using the dashboard that appears on his side (Figure 6-17), the Admin may keep track of all other users as well as scheduled appointments. The appointment's date and time, as well as the doctors that have been chosen. And in accordance of patients, he can see all of the new patients and their state, whether critical or not (Figure 6-18). The status of each appointment registered on the website will be displayed while choosing appointments button (Figure 6-19).

 
Figure ‎6 17. Dashboard 1.

 
Figure ‎6 18. Dashboard 2.




 
Figure ‎6 19. Appointments.

The admin is also in charge of adding or removing blogs (Figure6-20), lab/radio technicians (Figure 6-21), and nurses (Figure 6-22).






















Also the admin can edit the doctor, patient, nurse, lab and radio technician (Figure 6-23).




And finally the admin can change the password (Figure 6-24).
 
Figure ‎6 24. Change Password.


6.1.4.2. Doctor Side:
After login in and selecting doctor from the user types, the doctor will be in charge of checking his appointments and marking them as done (Figure 6-25). He'll also be able to check his schedule (Figure 6-26). He can also check on his patients (Figure 6-27), read their medical files (Figure 6-28) and update it. Doctor can read the medical file and update to it through an API that is given to our website (Medlife), and it is secured enough, so the one who needs to update the medical file must have an access to the Medfile database through API that will be shared with him (Figure 6-29). In this way doctors from different hospitals and even in their clinics can add to the medical file and share their diagnosis and prescription with other doctors. This is our sharable medical file. Doctor can also request a lab or radiology test (Figure 6-30). The dashboard is accessible from his side, allowing him to see the overall number of patients, check his daily appointments, and view new patients with their status (critical or not) (Figure 6-31). Finally, he has the option of changing the password (Figure 6-32).


 
Figure ‎6 26. Doctor's Schedule.
 
Figure ‎6 27. Doctor's Patients.

 
Figure ‎6 28. MedFile.

 
Figure ‎6 29. Add to the file.


 
Figure ‎6 31. Doctor's dashboard.

 
Figure ‎6 32. Change password option.

6.1.4.3. Lab and Radio Technician Sides:
After selecting a lab or radio technician from the user list, MedLife will display a list of patients for whom the doctor has requested lab or radio tests (Figure 6-33), and they will be responsible for adding the test file to the patient's medical life (Figure 6-34).


And both lab and radio technicians have the option to change the password (Figure 6-35).

6.1.4.4. Nurse Side:
At the nurse's side, MedLife displays critical patients (Figure 6-36) in such a way that medical information (blood pressure, diabetes, heart beat) may be added (Figure 6-37).
 
Figure ‎6 36. Critical Patients.





The nurse has also the option to change the password (Figure 6-38).
 
Figure ‎6 38. Nurse-Change password.

6.1.4.5. Patient Side:
Patients are our main focus in this project, so when they access our MedLife system, they will see a page with various options such as the home page (Figure 6-39), Department (Figure 6-40), the list of available doctors (Figure 6-41), our blogs (Figure 6-42) and they can contact us and get location information (Figure 6-43) and they can schedule an appointment (Figure 6-44) with a pop screen if the appointment was successfully scheduled, and if it was not (Figure 6-45) and view their medical files (Figure 6-46) but to schedule an appointments and access the medical files patients must log in using their SSN number, and if they are new patients, they must first register (Figure 6-47).
 
Figure ‎6 39. Home Page.
 
Figure ‎6 40. Departments.

 
Figure ‎6 41. Doctors.
 
Figure ‎6 42. Blogs.

 
Figure ‎6 43. Contact Us.
 
Figure ‎6 44. Schedule an Appointment.











 
Figure ‎6 47. Sign up/in.
