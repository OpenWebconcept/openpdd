# ReadSpeaker

The ReadSpeaker library requires manual maintenance because the script is frequently updated.
We apply SRI to our scripts but since RS does not have a version (yet) this means the integrity hash may be incorrect and break the script therefore we are applying the updates manually. We're notified by RS when the source library is changed.

```txt
Origin: https://cdn1.readspeaker.com/script/<ID>/webReader/webReader.js?pids=wr
Command: openssl dgst -sha384 -binary <FILENAME>.js | openssl base64 -A
```

Make sure the integrity starts with `sha384-` inside the script tag.
