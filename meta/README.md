# Generate DataType and Segment classes

The following command will generate the types (specified in
`meta/data/{version}/dataTypes.yml`) in `lib/DataType/V2NN`:-

    $ php meta/generateDataTypes.php

The dependencies between types are first resolved so that the dependent ones
are generated later then those on which they depend.

When all DataType classes needed by the Segments (specified in
`meta/data/i{version}/segments.yml`) have been generated, the following will
generate the Segment classes in `lib/Segment/V2NN`:-

    $ php meta/generateSegments.php
