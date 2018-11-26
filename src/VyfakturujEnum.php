<?php
/**
 * @package Redbit\Vyfakturuj\Api
 * @license MIT
 * @copyright 2016-2018 Redbit s.r.o.
 * @author Redbit s.r.o. <info@vyfakturuj.cz>
 * @author Ing. Martin Dostál
 */

namespace Redbit\Vyfakturuj\Api;

/**
 * Definice pomocných konstant
 */
class VyfakturujEnum
{
    // Invoice types (type)
    public const DOCUMENT_TYPE_FAKTURA = 1; // Faktura
    public const DOCUMENT_TYPE_ZALOHOVA_FAKTURA = 2; // Zálohová faktura
    public const DOCUMENT_TYPE_PROFORMA_FAKTURA = 4; // Proforma faktura
    public const DOCUMENT_TYPE_VYZVA_K_PLATBE = 8; // Výzva k platbě
    public const DOCUMENT_TYPE_DANOVY_DOKLAD = 16; // Daňový doklad
    public const DOCUMENT_TYPE_OPRAVNY_DANOVY_DOKLAD = 32; // Opravný daňový doklad
    public const DOCUMENT_TYPE_PRIJMOVY_DOKLAD = 64; // Příjmový doklad
    public const DOCUMENT_TYPE_OPRAVNY_DOKLAD = 128; // Opravný doklad
    public const DOCUMENT_TYPE_OBJEDNAVKA = 512; // Objednávka

    // Invoice flags (flags)
    public const DOCUMENT_FLAG_IS_VAT_PAYER = 1; // Dokument obsahuje DPH
    public const DOCUMENT_FLAG_IS_PAID = 2; // Uhrazeno
    public const DOCUMENT_FLAG_IS_SENT = 4; // Odesláno e-mailem zákazníkovi
    public const DOCUMENT_FLAG_IS_STORNO = 8; // Doklad je stornován
    public const DOCUMENT_FLAG_IS_SENT_REMINDER = 16; // Odeslána e-mailem zákazníkovi upomínka
    public const DOCUMENT_FLAG_WARNING_OVERCHARGE = 32; // Přeplatek
    public const DOCUMENT_FLAG_WARNING_UNDERCHARGE = 64; // Nedoplatek
    public const DOCUMENT_FLAG_IS_DOWNLOADED_BY_ACCOUNTANT = 256; // Doklad byl stažen účetním

    // Invoice EET status (eet_status)
    public const EET_STATE_NO_EET = 1; // Nevstupuje - doklad nesplňuje podmínky pro vstup do EET
    public const EET_STATE_NO_SEND = 2; // Neodesílat - při tisku dokladu nedojde k odeslání do EET
    public const EET_STATE_READY_TO_SEND = 4; // K odeslání - doklad je určen k odeslání do EET
    public const EET_STATE_EXTERNAL = 8; // Externě - záznam o tržbě evidovalo jiné zařízení
    public const EET_STATE_SENT_TO_EET = 16; // Odesláno - doklad byl odeslán do EET
    public const EET_STATE_SENT_ERROR = 32; // Chyba - nastala chyba při odeslání

    // Payment methods (payment_method)
    public const PAYMENT_METHOD_BANK = 1; // Bankovní převod
    public const PAYMENT_METHOD_CASH = 2; // Hotovost
    public const PAYMENT_METHOD_CASHONDELIVERY = 4; // Dobírka
    public const PAYMENT_METHOD_ONLINECARD = 8; // Kartou online
    public const PAYMENT_METHOD_ADVANCE = 16; // Záloha
    public const PAYMENT_METHOD_CREDIT = 32; // Zápočet
    public const PAYMENT_METHOD_PAYPAL = 128; // PayPal

    // VAT caclulate method (calculate_vat)
    public const VAT_CALC_METHOD_AMOUNT_WITHOUT_VAT = 1; // Položky jsou uvedeny jako základ daně
    public const VAT_CALC_METHOD_AMOUNT_WITH_VAT = 2; // Položky mají koncovou cenu s DPH
    public const VAT_CALC_METHOD_VAT_IS_IN_SPECIAL_MODE = 3; // DPH je účtováno ve speciálním režimu
    public const VAT_CALC_METHOD_REVERSE_CHARGE = 4; // DPH je v režimu prenesené daňové povinnosti
    public const VAT_CALC_METHOD_NOT_VATPAYER = 5; // Neplátce DPH

    // Price rounding (round_invoice)
    public const PRICE_ROUND_NONE = 1; // Nezaokrouhlovat
    public const PRICE_ROUND_HALEROVE_VYROVNANI = 2; // Háleřové vyrovnání
    public const PRICE_ROUND_ZAOKROUHLIT_DPH = 3; // Zaokrouhlit DPH

    // VAT rate (vat_rate_type)
    public const CAT_RATE_CUSTOM = 1; // Vlastní / historická
    public const CAT_RATE_BASE = 2; // Základní
    public const CAT_RATE_HIGH = 4; // Zvýšená
    public const CAT_RATE_LOW = 8; // Snížená
    public const CAT_RATE_LOW2 = 16; // Druhá snížená
    public const CAT_RATE_LOW3 = 32; // Nulová
    public const CAT_RATE_ZERO = 64; // Neplátce - není daň
    public const CAT_RATE_NULL = 128; // Třetí snížená

    // Template type (type)
    public const TEMPLATE_TYPE_TEMPLATE = 1; // Šablona
    public const TEMPLATE_TYPE_REPEATED = 2; // Pravidelná faktura

    // Repeated invoice start (start_type)
    public const SCHEDULE_START_TYPE_DATE = 1; // Přesné datum
    public const SCHEDULE_START_TYPE_FIRST = 2; // První den v měsíci
    public const SCHEDULE_START_TYPE_LAST = 4; // Poslední den v měsíci

    // Repeated invoice end (end_type)
    public const SCHEDULE_END_TYPE_ALWAYS = 1; // Bez ukončení
    public const SCHEDULE_END_TYPE_UNTIL_DATE = 2; // Podle data
    public const SCHEDULE_END_TYPE_COUNT = 4; // Podle počtu dokladů
    public const SCHEDULE_END_TYPE_UNTIL_PAID = 8; // Zastavit při prvním neuhrazeném dokladu
    public const SCHEDULE_END_TYPE_STOP = 16; // Zastaveno (další se již nebudou generovat)

    // Document type to send to mail (type)
    public const MAIL_SEND_TYPE_INVOICE = 1; // Nový doklad
    public const MAIL_SEND_TYPE_REMINDER = 2; // Upomínka
    public const MAIL_SEND_TYPE_IS_PAID = 3; // Doklad byl uhrazen
}
