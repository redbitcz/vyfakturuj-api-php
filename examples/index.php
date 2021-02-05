<?php

require_once __DIR__ . '/config.php';

?>
<h2>Seznam příkladů</h2>
<ul>
    <li><a href="test-connection.php">Test připojení k serveru</a></li>
    <li><h3>Faktury</h3>
        <ul>
            <li><a href="Invoice/create-invoice.php">create-invoice.php</a></li>
            <li><a href="Invoice/create-invoice-with-customer-in-directory.php">create-invoice-with-customer-in-directory.php</a>
            </li>
            <li><a href="Invoice/delete-invoice.php">delete-invoice.php</a></li>
            <li><a href="Invoice/filter-invoices.php">filter-invoices.php</a></li>
            <li><a href="Invoice/read-invoice.php">read-invoice.php</a></li>
            <li><a href="Invoice/search-invoices.php">search-invoices.php</a></li>
            <li><a href="Invoice/send-invoice-to-eet.php">send-invoice-to-eet.php</a></li>
            <li><a href="Invoice/send-email-with-invoice.php">send-email-with-invoice.php</a></li>
            <li><a href="Invoice/set-payment-to-invoice.php">set-payment-to-invoice.php</a></li>
            <li><a href="Invoice/test-invoice-download.php">test-invoice-download.php</a></li>
            <li><a href="Invoice/update-invoice.php">update-invoice.php</a></li>
        </ul>
    </li>
    <li><h3>Adresář a kontakty</h3>
        <ul>
            <li><a href="Contact/create-contact.php">create-contact.php</a></li>
            <li><a href="Contact/delete-contact.php">delete-contact.php</a></li>
            <li><a href="Contact/read-contact.php">read-contact.php</a></li>
            <li><a href="Contact/search-contact.php">search-contact.php</a></li>
            <li><a href="Contact/update-contact.php">update-contact.php</a></li>
        </ul>
    </li>
    <li><h3>Šablony a pravidelné faktury</h3>
        <ul>
            <li><a href="Template/create-template.php">create-template.php</a></li>
            <li><a href="Template/delete-template.php">delete-template.php</a></li>
            <li><a href="Template/read-template.php">read-template.php</a></li>
            <li><a href="Template/read-templates.php">read-templates.php</a></li>
            <li><a href="Template/search-templates.php">search-templates.php</a></li>
            <li><a href="Template/update-template.php">update-template.php</a></li>
        </ul>
    </li>
    <li><h3>Nastavení</h3>
        <ul>
            <li><a href="Settings/number-series.php">number-series.php</a></li>
            <li><a href="Settings/payment-method.php">payment-method.php</a></li>
        </ul>
    </li>
    <li><a href="error-handle.php">Ošetření chyb</a></li>
</ul>