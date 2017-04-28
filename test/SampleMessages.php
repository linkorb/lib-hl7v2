<?php

namespace Hl7v2\Test;

use Hl7v2\Encoding\EncodingParametersBuilder;

class SampleMessages
{
    const MESSAGE = <<<'EOD'
MSH|^~\&|ACME|ACMETESTCENTRUM|TEST|TEST|20160719132745||ORU^R01|906|P|2.5.1|||AL|AL||8859/1
PID|1||123548999^^^^NNNLD||ACMETEST^K||19850317|F|||Dam 1^^Amsterdam^^1000 AA||0619056432^^^acmetest@hotmail.com
PV1|||||||||||||||||||12344
OBR|||819^ACME|^OBS|||20160513130300||||||||||||||code  testlocatie||||F|||||||dr. paracelsus&&&&&&&&2147483647
OBX|1|NM|GRAVIDA||1||||||F
OBX|2|NM|PARITY||1||||||F
OBX|3|TS|DUE_DATE||20160809000000||||||F
OBX|4|ST|GESTATIONAL_AGE||27w3d||||||F
OBX|5|NM|HC|1|251|mm|||||F
OBX|6|NM|AC|1|226|mm|||||F
OBX|7|NM|FL|1|51|mm|||||F
OBX|8|NM|WEIGHT|1|1034|g^^ISO+|||||F
OBX|9|NM|HCperc|1|23.3|Verb|||||F
OBX|10|NM|ACperc|1|26|Verb|||||F
OBX|11|NM|FLperc|1|46.6|Verb|||||F
OBX|12|NM|WEIGHTperc|1|48,5|Yudkin|||||F
OBX|13|TX|PLACENTALOC|1|hoog anterior||||||F
OBX|14|TX|DIAGNOSIS||Groei: goede groei op de p ||||||F
OBX|15|TX|CONCLUSION||dit is de conclusie~dit is de 2e regel||||||F
EOD;

    const MESSAGE_TWIN = <<<'EOD'
MSH|^~\&|ACME|ACME|TEST|TEST|20160719130739||ORU^R01|969|P|2.5.1|||AL|AL||8859/1
PID|1||64654^^^^PI~123548999^^^^NNNLD||ACMETEST^K||19850317|vrouwelijk|||Dam 1^^Amsterdam^^1000 AA||0619056432^^^acmetest@hotmail.com
OBR|||919^ACME|^OBS|||20160407123100||||||||||||||||||C|||||||admin&&&&&&&&BSK
OBX|1|TS|DUE_DATE||20160809000000||||||F
OBX|2|ST|GESTATIONAL_AGE||22w2d||||||F
OBX|3|NM|HC|1|198|mm|||||F
OBX|4|NM|HC|2|200|mm|||||F
OBX|5|NM|AC|1|175|mm|||||F
OBX|6|NM|AC|2|180|mm|||||F
OBX|7|NM|FL|1|40|mm|||||F
OBX|8|NM|FL|2|40|mm|||||F
OBX|9|NM|WEIGHT|1|511|g^^ISO+|||||F
OBX|10|NM|WEIGHT|2|532|g^^ISO+|||||F
OBX|11|TX|PLACENTALOC|1|hoog anterior||||||F
OBX|12|TX|PLACENTALOC|2|hoog anterior||||||F
OBX|13|TX|DIAGNOSIS||Er zijn geen aanwijzingen voor structurele afwijkingen. ||||||F
EOD;

    public static function getDatagramBuilder()
    {
        $b = new DatagramBuilder(new EncodingParametersBuilder());
        return $b->withMessage(str_replace("\n", "\r", self::MESSAGE) . "\r");
    }
}
