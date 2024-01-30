<?php

    // Common includes for main PHP pages (controllers)
    require_once "includes/common.php";

    // Config
    $title = "Manage Products";

    // Start output buffering (capture output, don't display it yet)
    ob_start();

    // Check what action the page is performing (list items, add item, edit item, delete item, etc)
    $action = $_GET["action"] ?? "";

    // Add item
    if (isset($_POST["submitAddCategory"]))
    {
        addItem();
    }
    // Delete item
    else if (isset($_POST["submitDeleteCategory"]))
    {
        deleteItem();
    }
    // Show add form
    else if ($action === "add")
    {
        showAddForm();
    }
    // Show delete form
    else if ($action === "delete")
    {
        showDeleteForm();
    }
    // Show list of items
    else
    {
        showList();
    }

    // Add item
    function addItem()
    {
        // Form has been submitted - process form data

        // Get data passed to this page (in the $_POST super global array)
        $name = $_POST["name"] ?? "";
        $description = $_POST["description"] ?? "";

        // Clean up input data (e.g. trim)
        $name = trim($name);
        $description = trim($description);

        // Collection of all errors for this form (empty by default)
        $errors = [];

        // Validate name (2-10 characters)
        if (strlen($name) < 2 || strlen($name) > 15) {
            $errors["name"] = "Name must be between 2-10 characters";
        }

        // Validate description (2-20 characters)
        if (empty($description)) {
            $errors["description"] = "Description is required";
        } else if (strlen($description) > 1000) {
            $errors["description"] = "Description must be at most 1000 characters";
        }

        // Check for invalid data (errors)
        if (!empty($errors)) {

            // Invalid: Display the form with error messages
            include_once "templates/_addCategoryForm.html.php";

        } else {

            // Valid: Insert the category into the database & display confirmation

            // Build a new category
            $category = new Category();
            $category->setCategoryName($name);
            // Insert the category & get the ID of the new category (that has been auto-generated)
            $newCategoryId = $category->insertCategory();
            
            // Display success message
            $successMessage = "Category added successfully, new ID: $newCategoryId";
            include_once "templates/_success.html.php";

        }
    }

    // Delete item
    function deleteItem()
    {
        // Form has been submitted - process form data

        // Get data passed to this page
        $categoryId = $_POST["categoryId"] ?? "";

        // Clean up input data (e.g. trim)
        $categoryId = intval($categoryId);

        // Collection of all errors for this form (empty by default)
        $errors = [];

        // Validate ID
        if ($categoryId === 0) {
            $errors["categoryId"] = "Category ID must be a valid integer.";
        }

        // TODO: Check if category has any products (if so, stop the delete!!)

        // Check for invalid data (errors)
        if (!empty($errors)) {

            // Invalid: Display the list with error messages
            include_once "templates/_manageCategoriesPage.html.php";

        } else {

            // Valid: Delete the category from the database & display confirmation

            // Build a new category
            $category = new Category();

            // Delete the category
            if ($category->deleteCategory($categoryId)) {
                
                // Display success message
                $successMessage = "Category deleted successfully.";
                include_once "templates/_success.html.php";

            } else {
                
                // Display error message
                $errorMessage = "Category could not be deleted, try again.";
                include_once "templates/_error.html.php";
                
            }
            
            

        }
    }
    
    // Show add form
    function showAddForm()
    {

        // Display the form
        include_once "templates/_addCategoryForm.html.php";

    }

    // Show delete form
    function showDeleteForm()
    {

        // Get category ID
        $categoryId = intval($_GET["categoryId"] ?? 0);

        // Check for no ID
        if ($categoryId === 0) {

            // Display main listing with error
            $errors["category"] = "Category ID does not exist!";
            include_once "templates/_manageCategoriesPage.html.php";

            // "Guard clause" = early exit
            return;
        }

        // Get the category
        $category = new Category();
        $category->getCategory($categoryId);

        // TODO: Check if category exists (did we find one in the DB?)
        // if ($category->getCategoryId())

        // Display the form
        include_once "templates/_deleteCategoryForm.html.php";

    }

    // Show list of items
    function showList()
    {

        // Display the list of items
        include_once "templates/_manageCategoriesPage.html.php";

    }
    
    // Stop output buffering - store output in the $output variable
    $output = ob_get_clean();

    // Include the layout template (and inject content via $output)
    include_once "templates/_layout.html.php";
    