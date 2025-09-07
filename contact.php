<?php


$contacts = [];

function showMenu() {
    echo "\n====== CONTACT MANAGEMENT APP ======\n";
    echo "1. Add Contact\n";
    echo "2. View Contacts\n";
    echo "3. Exit\n";
    echo "Choose an option: ";
}

function addContact(&$contacts) {
    echo "Enter Name: ";
    $name = trim(fgets(STDIN));

    echo "Enter Phone: ";
    $phone = trim(fgets(STDIN));

    $contacts[] = [
        "name" => $name,
        "phone" => $phone
    ];

    echo "Contact added successfully!\n";
}

function viewContacts($contacts) {
    echo "\n------ Saved Contacts ------\n";
    if (empty($contacts)) {
        echo "No contacts found.\n";
    } else {
        foreach ($contacts as $index => $contact) {
            echo ($index + 1) . ". " . $contact['name'] . " - " . $contact['phone'] . "\n";
        }
    }
}

while (true) {
    showMenu();
    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case "1":
            addContact($contacts);
            break;
        case "2":
            viewContacts($contacts);
            break;
        case "3":
            echo "👋 Exiting... Goodbye!\n";
            exit;
        default:
            echo " Invalid option. Please try again.\n";
    }
}
