# How to Integrate Elementor Forms with any API (almost)
The following code snuppet will send elementor form data to a third party API. It uses a simple elementor form action hook to send JSON formmatted data using the POST method to a public API, and authenticates the request using your API key in the header. It works great for adding or updating contacts to a CRM or email marketing service. Thiscode is pretty much straight out of elmentor's developer docs, but with more background info and instructions for a beginner or intermediate user.

### Requirements:
- Wordpress
- Elementor
- Elementor Pro (required to use their form widget)
- Tested with Hello Elementor theme

### How to use this code snippet:
- Check your 3rd party API developer documentation. You will need the following information handy, so save it in a google doc or tect file:
  - check how to generate an API key for your provider; it's usually just a few clicks to generate your secret key
  - go ahead and create your unique API key - make sure to save it because it may not be displayed again
  - check dev docs for:
    - API authentication formatting (is it 'api-key', or 'authenticate'? 'Bearer' or 'Basic ', or something else?) 
    - endpoint webhook URL(s)
    - required fields (for example 'email address' and 'list' fields may be required to add a new contact, and you can add more optional fields like tags, first name, etc)
    - field key (also known as ID or label) and value formatting information (for example the id or label for the email address field could be 'email')
- Whew! You're ready to start working with elementor. Add the functions.php code snippet to your theme's functions.php file under any other code
- Create a new form in elementor. 
  - add required fields as specified in your CRM/whatever 3rd party API documenation. ex. name, email, subssriber list, subscriber status
  - go to advanced tab - enter the field ID and make sure the IDs match the key labels used in the 3rd party API docs

### Related developer docs & issues:
-Elementor custom action forms API https://developers.elementor.com/forms-api/custom-form-action/
-related issue: https://github.com/elementor/elementor/issues/4785
-related question: https://stackoverflow.com/questions/65097612/hook-into-form-submit-of-elementor-pro-form-widget

### To do:
-error handling
-wrap this code in an easy to use plugin, like https://github.com/Webtica/integration-for-elementor-forms-sendinblue
