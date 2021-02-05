<?php
/**
 * @package Redbitcz\Vyfakturuj\VyfakturujAPI
 * @license MIT
 * @copyright 2016-2021 Redbit s.r.o.
 * @author Redbit s.r.o. <info@vyfakturuj.cz>
 */

/**
 * Definice pomocných konstant
 */
class VyfakturujEnum
{
    // Invoice types (type)
    const DOCUMENT_TYPE_FAKTURA = 1; // Faktura
    const DOCUMENT_TYPE_ZALOHOVA_FAKTURA = 2; // Zálohová faktura
    const DOCUMENT_TYPE_PROFORMA_FAKTURA = 4; // Proforma faktura
    const DOCUMENT_TYPE_VYZVA_K_PLATBE = 8; // Výzva k platbě
    const DOCUMENT_TYPE_DANOVY_DOKLAD = 16; // Daňový doklad
    const DOCUMENT_TYPE_OPRAVNY_DANOVY_DOKLAD = 32; // Opravný daňový doklad
    const DOCUMENT_TYPE_PRIJMOVY_DOKLAD = 64; // Příjmový doklad
    const DOCUMENT_TYPE_OPRAVNY_DOKLAD = 128; // Opravný doklad
    const DOCUMENT_TYPE_OBJEDNAVKA = 512; // Objednávka

    // Invoice flags (flags)
    const DOCUMENT_FLAG_IS_VAT_PAYER = 1; // Dokument obsahuje DPH
    const DOCUMENT_FLAG_IS_PAID = 2; // Uhrazeno
    const DOCUMENT_FLAG_IS_SENT = 4; // Odesláno e-mailem zákazníkovi
    const DOCUMENT_FLAG_IS_STORNO = 8; // Doklad je stornován
    const DOCUMENT_FLAG_IS_SENT_REMINDER = 16; // Odeslána e-mailem zákazníkovi upomínka
    const DOCUMENT_FLAG_WARNING_OVERCHARGE = 32; // Přeplatek
    const DOCUMENT_FLAG_WARNING_UNDERCHARGE = 64; // Nedoplatek
    const DOCUMENT_FLAG_IS_DOWNLOADED_BY_ACCOUNTANT = 256; // Doklad byl stažen účetním

    // Invoice EET status (eet_status)
    const EET_STATE_NO_EET = 1; // Nevstupuje - doklad nesplňuje podmínky pro vstup do EET
    const EET_STATE_NO_SEND = 2; // Neodesílat - při tisku dokladu nedojde k odeslání do EET
    const EET_STATE_READY_TO_SEND = 4; // K odeslání - doklad je určen k odeslání do EET
    const EET_STATE_EXTERNAL = 8; // Externě - záznam o tržbě evidovalo jiné zařízení
    const EET_STATE_SENT_TO_EET = 16; // Odesláno - doklad byl odeslán do EET
    const EET_STATE_SENT_ERROR = 32; // Chyba - nastala chyba při odeslání

    // Payment methods (payment_method)
    const PAYMENT_METHOD_BANK = 1; // Bankovní převod
    const PAYMENT_METHOD_CASH = 2; // Hotovost
    const PAYMENT_METHOD_CASHONDELIVERY = 4; // Dobírka
    const PAYMENT_METHOD_ONLINECARD = 8; // Kartou online
    const PAYMENT_METHOD_ADVANCE = 16; // Záloha
    const PAYMENT_METHOD_CREDIT = 32; // Zápočet
    const PAYMENT_METHOD_PAYPAL = 128; // PayPal

    // VAT caclulate method (calculate_vat)
    const VAT_CALC_METHOD_AMOUNT_WITHOUT_VAT = 1; // Položky jsou uvedeny jako základ daně
    const VAT_CALC_METHOD_AMOUNT_WITH_VAT = 2; // Položky mají koncovou cenu s DPH
    const VAT_CALC_METHOD_VAT_IS_IN_SPECIAL_MODE = 3; // DPH je účtováno ve speciálním režimu
    const VAT_CALC_METHOD_REVERSE_CHARGE = 4; // DPH je v režimu prenesené daňové povinnosti
    const VAT_CALC_METHOD_NOT_VATPAYER = 5; // Neplátce DPH

    // Price rounding (round_invoice)
    const PRICE_ROUND_NONE = 1; // Nezaokrouhlovat
    const PRICE_ROUND_HALEROVE_VYROVNANI = 2; // Háleřové vyrovnání
    const PRICE_ROUND_ZAOKROUHLIT_DPH = 3; // Zaokrouhlit DPH

    // VAT rate (vat_rate_type)
    const CAT_RATE_CUSTOM = 1; // Vlastní / historická
    const CAT_RATE_BASE = 2; // Základní
    const CAT_RATE_HIGH = 4; // Zvýšená
    const CAT_RATE_LOW = 8; // Snížená
    const CAT_RATE_LOW2 = 16; // Druhá snížená
    const CAT_RATE_LOW3 = 32; // Nulová
    const CAT_RATE_ZERO = 64; // Neplátce - není daň
    const CAT_RATE_NULL = 128; // Třetí snížená

    // Template type (type)
    const TEMPLATE_TYPE_TEMPLATE = 1; // Šablona
    const TEMPLATE_TYPE_REPEATED = 2; // Pravidelná faktura

    // Repeated invoice start (start_type)
    const SCHEDULE_START_TYPE_DATE = 1; // Přesné datum
    const SCHEDULE_START_TYPE_FIRST = 2; // První den v měsíci
    const SCHEDULE_START_TYPE_LAST = 4; // Poslední den v měsíci

    // Repeated invoice end (end_type)
    const SCHEDULE_END_TYPE_ALWAYS = 1; // Bez ukončení
    const SCHEDULE_END_TYPE_UNTIL_DATE = 2; // Podle data
    const SCHEDULE_END_TYPE_COUNT = 4; // Podle počtu dokladů
    const SCHEDULE_END_TYPE_UNTIL_PAID = 8; // Zastavit při prvním neuhrazeném dokladu
    const SCHEDULE_END_TYPE_STOP = 16; // Zastaveno (další se již nebudou generovat)

    // Document type to send to mail (type)
    const MAIL_SEND_TYPE_INVOICE = 1; // Nový doklad
    const MAIL_SEND_TYPE_REMINDER = 2; // Upomínka
    const MAIL_SEND_TYPE_IS_PAID = 3; // Doklad byl uhrazen
}
