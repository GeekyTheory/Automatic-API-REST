__author__ = 'Alejandro Esquiva Rodriguez'

from AARConnector import *

#AAR Instance

##Create instance via URL
AAR = AARConnector(url="http://automaticapirest.info/demo/getData.php?t=Country&c=Code,Name&l=0,5")

##Create instance via parameters
AAR = AARConnector(domain="http://automaticapirest.info/demo/",table="Country",columns="Name",orderby="Name",limit="10",where="Name:'Albania'")

#Get all the json
jsondata = AAR.getJson()
'''
print(jsondata)
##########################
{'dbInfo': ['Code', 'Name'], 'data': [{'1': 'Aruba', 'Code': 'ABW', '0': 'ABW', 'Name': 'Aruba'}, {'1': 'Afghanistan', 'Code': 'AFG', '0': 'AFG', 'Name': 'Afghanistan'}, {'1': 'Angola', 'Code': 'AGO', '0': 'AGO', 'Name': 'Angola'}, {'1': 'Anguilla', 'Code': 'AIA', '0': 'AIA', 'Name': 'Anguilla'}, {'1': 'Albania', 'Code': 'ALB', '0': 'ALB', 'Name': 'Albania'}]}
'''

#Get all the data
data = AAR.getData()

#Get query info
dbinfo = AAR.getDBInfo()

#Output a specific data

#Name in the first row
name = data[0]["Name"]
#OR
name = data[0]["0"]

print(name)


#Print query info
AAR.printDBInfo()


'''
[
 "Code",
 "Name"
]
'''

#Print Data
AAR.printData()

'''
[
 {
  "0": "ABW",
  "1": "Aruba",
  "Code": "ABW",
  "Name": "Aruba"
 },
 {
  "0": "AFG",
  "1": "Afghanistan",
  "Code": "AFG",
  "Name": "Afghanistan"
 },
 {
  "0": "AGO",
  "1": "Angola",
  "Code": "AGO",
  "Name": "Angola"
 },
 {
  "0": "AIA",
  "1": "Anguilla",
  "Code": "AIA",
  "Name": "Anguilla"
 },
 {
  "0": "ALB",
  "1": "Albania",
  "Code": "ALB",
  "Name": "Albania"
 }
]
'''


