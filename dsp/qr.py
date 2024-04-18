import segno
import sys




# Check if a command-line argument was provided
if len(sys.argv) > 1:
    # The first argument (index 0) is the script name, so we start from index 1
    regno = sys.argv[1]
    

    qr_img_path = "qr/{}.png".format(regno)


    qrcode = segno.make_qr(regno)
    qrcode.save(qr_img_path,scale=20)
    
    # Output the path to the generated QR code image
    print(qr_img_path)
else:
    print("No registration number provided")
