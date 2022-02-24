# How to Integrate Elementor Forms with an API
The following code snippet will send elementor form data to a third party API. It's great for adding or updating contacts to a CRM or email marketing service. It uses a simple elementor form action to send JSON formatted data using the POST method to a public API, and authenticates the request using your API key in the header. This code is pretty much straight out of elmentor's developer docs, but with more background info and instructions for a beginner or intermediate user.

### Requirements:
- Wordpress
- Elementor
- Elementor Pro (required to use their form widget)
- Tested with Hello Elementor theme

### How to use this code snippet:
- Check your 3rd party API developer documentation. You will need the following information handy, so save it in a google doc or text file
  - generate your unique API key or token for your application; it's usually just a few clicks to generate your secret key. Make sure to save it because it may not be displayed again.
  - check dev docs for:
    - API authentication formatting and type (is it 'api-key', or 'authorization'? 'Bearer' or 'Basic ', or something else?) 
    - endpoint webhook URL. Ex. 'https://api/example.com/api/contact'
    - required fields (for example 'email address' and 'list' fields may be required to add a new contact, and you can use optional fields like tags, first name, etc)
    - field key formatting for key-value pairing. Key may also be known as ID or field name. For example, the key/ID to store the email address value could be 'email'.
- Whew! You're ready to start working with elementor. Create a new form or update an existing form in elementor. In the form widget:
  - Under Content -> Form Fields -> Form Name, enter a short name. Make sure it is unique. You will enter this into the code snippet so use - or _ instead of spaces between words. Ex. "my_crm_contact_form"
  - add the required form fields as specified in your 3rd party API documentation. Ex. name, email, subscriber list, subscriber status
  - You will need to match each form field to the key/ID from the API. On each form field go to advanced tab. Enter the field key used in the 3rd party API docs in the ID box. Ex. If the api key for the subscriber status field is "sub_status", enter sub_status.
  - Add the appropriate API field name for each form field ID.
- Add the functions.php code snippet to your theme's functions.php file. Copy and paste it under any other theme/child styling code. Add your unqiue info to the code:
  - replace MY_FORM_NAME with your elementor form name. Ex. my_crm_contact_form
  - replace YOUR_API_KEY_OR_TOKEN_HERE with your API key
  - check the API authentication formmating. This code is currently set to " 'Authorization' => 'Bearer ' . " You may need to edit both parts of the authentication line  ('authorization' and 'bearer .') depending on what your 3rd party API calls for. Ex. The correct formatting for your API could just be 'api-key' => $id_token
  - replace YOUR_API_ENDPOINT_URL_HERE with your API endpoint URL
- Time to test your form! You may need to play with the API field names, IDs or authorization formatting to get the data to send correctly. Note that the form may say it was sent successfully when it has not worked correctly. Check in your 3rd party application to make sure all data is being received as expected.

### Related developer docs & issues:
-Elementor custom action forms API https://developers.elementor.com/forms-api/custom-form-action/
-related issue: https://github.com/elementor/elementor/issues/4785
-related question: https://stackoverflow.com/questions/65097612/hook-into-form-submit-of-elementor-pro-form-widget

### To do:
-error handling so the end user sees accurate success/failure messages
-debugging tips
-wrap this code in an easy to use plugin, like https://github.com/Webtica/integration-for-elementor-forms-sendinblue
