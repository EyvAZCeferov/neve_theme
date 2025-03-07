<?php

// File generated from our OpenAPI spec

namespace StripeWPFS\Terminal;

/**
 * A Reader represents a physical device for accepting payment details.
 *
 * Related guide: <a
 * href="https://stripe.com/docs/terminal/payments/connect-reader">Connecting to a
 * Reader</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $device_sw_version The current software version of the reader.
 * @property string $device_type Type of reader, one of <code>bbpos_chipper2x</code>, <code>bbpos_wisepos_e</code>, or <code>verifone_P400</code>.
 * @property null|string $ip_address The local IP address of the reader.
 * @property string $label Custom label given to the reader for easier identification.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string|\StripeWPFS\Terminal\Location $location The location identifier of the reader.
 * @property \StripeWPFS\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $serial_number Serial number of the reader.
 * @property null|string $status The networking status of the reader.
 */
class Reader extends \StripeWPFS\ApiResource
{
    const OBJECT_NAME = 'terminal.reader';

    use \StripeWPFS\ApiOperations\All;
    use \StripeWPFS\ApiOperations\Create;
    use \StripeWPFS\ApiOperations\Delete;
    use \StripeWPFS\ApiOperations\Retrieve;
    use \StripeWPFS\ApiOperations\Update;
}
