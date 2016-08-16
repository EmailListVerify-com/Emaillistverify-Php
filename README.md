# Emaillistverify-Php

The verification API allows email addresses to be validated in your existing application during operations such as registration or user validation.


This API created for verify one email address per one api request, for example if you need to verify three emails - you need to request api three times. It's very simple to check "[email]", see in one_by_one.php example

======================================================================================
Status="ok"- A ok response is an address that has passed all tests.
The address provided passed all tests.

Status="fail"- A failed response is an address that has failed 1 or more tests.
The address provided does not exist.
The mailbox is full.
The address provided is a disposable email address.
The address provided is not in a valid format.
The address provided is a role account.
The address provided does not have a valid dns.
The address provided does not have a mx server.
The address provided was found in your internal blacklist containing previously failed addresses.
The domain provided was found in your domain blacklist.

Status="unknown"- A unknown response is an address that can not be accurately tested.
Is a Catchall mx server config.
Greylisting is active on this server, please try again in a few minutes.
Greylisting is suspected to be active on this server, please try again in a few minutes.
The address provided can not be verified at this time.

Status="incorrect"- No email provided in request.

Email syntax error (example: myaddress[at]gmail.com, must be myaddress@gmail.com)

Status=" key_not_valid"- No api key provided in request or invalid.

Status=" missing parameters"- There are no validations remaining to complete this attempt.

======================================================================================

also for bulk verification you can use bulk_email_verification.php example

This tool created for customers that want to upload emails list and download results in automatic mode. For example if you using bulk verification tool you need to: login to our service, open upload form, choose file, wait until file will be finished, download results. But this API allow to do this work for your software in fully automatic mode without login to site.

How it works:

1) your software uploading file with emails to our API and getting {file_id} as result

2) your software checking status of file by {file_id} (once per 10 minutes for example)

3) when status of file is "finished", your software downloading reports

Upload file with API:
There is link for file upload:

https://app.emaillistverify.com/api/verifApiFile?secret=PUT_YOUR_API_KEY_HERE&filename=NAME_OF_YOUR_FILE

Example of output when success: 10700

Example of output when error happens :

Status=" no_credit"- Your balance is $0.

Status=" cannot_upload_file"- File uploaded as broken.

Status=" key_not_valid"- No api key provided in request or invalid.

Status=" missing parameters"- There are no validations remaining to complete this attempt.


Get file info with API:
There is link that you need to request:

https://app.emaillistverify.com/api/getApiFileInfo?secret=PUT_YOUR_API_KEY_HERE&id=FILE_ID_OF_ALREADY_UPLOADED_FILE

Example of output for file that in progress : 10700|my_emails.txt|no|200|150|progress|1445878121||

Example of output for file that already finished : 10700|my_emails.txt|no|200|200|finished|1445878121|https://app.emaillistverify.com/app/webroot/files/52/655/result_ok_10700_2015-10-26.csv|https://app.emaillistverify.com/app/webroot/files/52/655/result_all_10700_2015-10-26.csv

Full errors list:

Status=" error_file_not_exists"- FILE ID is not exists on your account.

Status=" key_not_valid"- No api key provided in request or invalid.

Status=" missing parameters"- There are no validations remaining to complete this attempt.

String with information:

{file_id}|{filename}|{unique}|{lines}|{lines_processed}|{status}|{timestamp}|{link_all}|{link_ok}

{file_id} - the same FILE ID as you use for request "file info"

{filename} - name of file (same as you use during file upload)

{unique} - "yes" or "no", remove duplicates option (same as you use during file upload)

{lines} - total number of parsed emails in file

{lines_processed} - number of already processed emails

{status} - file status, it can be: new, parsing, incorrect , waiting , progress , suspended, canceled, finished

{timestamp} - date-time when you upload file (in unix format)

{link_all} - link to report "all", if link is empty - file is not finished yet.

{link_ok} - link to report "ok", if link is empty - file is not finished yet.

