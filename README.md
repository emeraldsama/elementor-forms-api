# elementor forms integrate with an API
Send elementor form data to a third party. A simple elementor form action to send JSON formmatted data using the POST method to a public API and authenticate with API header. Great for adding or updating contacts to a CRM or email marketing service.

### Requirements:
- Wordpress
- Elementor
- Elementor Pro (required to use their form widget)
- Tested with Hello Elementor theme

### How to use this code snippet:
- Check your 3rd party API developer documentation. You will need the following information:
  - how to generate an API key / token
  - API authentication formatting (is it 'api-key', or 'authenticate'? 'Bearer" or Basic [or other?]) 
  - go ahead and create said API key
  - find endpoint webhook URL
  - find required fields (ex email address and list may be required to add a new contact, along with optional fields like tags, first name, etc)
  - find field key/label and value formatting information (ex the id of email address is 'email')
- Add this snippet to your theme's functions.php file under any other code
- Create a form in elmentor. 
  - add required fields as specified in your CRM/whatever 3rd party API documenation. ex. name, email
  - go to advanced tab - enter the field ID and make sure that matches the labels used in the 3rd party API docs

### Related Developer Docs & Github issues:
-Elementor custom action forms API https://developers.elementor.com/forms-api/custom-form-action/
-related isue: https://github.com/elementor/elementor/issues/4785

### To do:
-error handling
-wrap this code in an easy to use plugin, like https://github.com/Webtica/integration-for-elementor-forms-sendinblue
