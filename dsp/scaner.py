import mysql.connector
import cv2 as cv
import pyzbar.pyzbar as pyzbar
from datetime import datetime

now = datetime.now()
time = str(now.strftime("%d-%m-%Y %H:%M:%S"))

def roll():
    stu = set()

    capture = cv.VideoCapture(0)

    while True:
        isTrue, frame = capture.read()
        cv.imshow('vid', frame)

        data = pyzbar.decode(frame)

        for d in data:
            # Extract the QR code data and convert it to a string
            qr_data = d.data.decode('utf-8')
            stu.add(qr_data)

            # Draw a green rectangle around the QR code
            x, y, w, h = d.rect
            cv.rectangle(frame, (x, y), (x + w, y + h), (0, 255, 0), 2)

        cv.imshow('vid', frame)

        if cv.waitKey(1) & 0xFF == ord('d'):
            break

    capture.release()
    cv.destroyAllWindows()
    return stu

stp = roll()
stl = list(stp)

print(stl)

try:
    db_connection = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="dsp"
    )
    if db_connection.is_connected():
        cursor = db_connection.cursor()

        # Construct the ALTER TABLE query
        alter_query = f"ALTER TABLE students ADD COLUMN `{time}` varchar(10) DEFAULT 'Absent' ;"

        # Execute the query
        cursor.execute(alter_query)

        # Update database
        for i in stl:
            value = str(i)

            # Construct the UPDATE query
            update_query = f"UPDATE `students` SET `{time}`='Present' WHERE `regno`='{value}' "

            # Execute the query
            cursor.execute(update_query)

        # Commit the changes
        db_connection.commit()

except mysql.connector.Error as err:
    print("Error:", err)
