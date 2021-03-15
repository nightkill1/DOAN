import serial

s = serial.Serial('COM7')
s.write('@')
res = s.read()
print(res)