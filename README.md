### QR Code Generator.

This is a QR code generation tool build for local usage only.
No security practices considered!

### How to use

1. Start server
    1. On Bare Metal
        1. Make sure `PHP 8.0` and `Composer` is available
        2. Make sure your system have `qrencode` installed
        3. Navigate to project root and run `composer start`
      
    2. On Docker
        1. Build the image with `docker build -t qr-generator .`
        2. Start container with `docker run -p "8000:8000" -d --name qr-generator qr-generator`
        3. GENERATED QR CODES AREN'T PERSISTENT. to store it mount volume in `/app/qrs`

2. Open your browser and go to http://localhost:8000
 

