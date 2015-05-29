__author__ = 'Alesandro.Esquiva'

import urllib.request
import urllib.parse
import json

class AARConnector:
    def __init__(self,**kwargs):
        self.url = kwargs.get("url","")
        self.domain = kwargs.get("domain","http://automaticapirest.info/demo/")
        self.table = kwargs.get("table","")
        self.columns = kwargs.get("columns","")
        self.orderby = kwargs.get("orderby","")
        self.way = kwargs.get("way","ASC")
        self.limit = kwargs.get("limit","")
        self.where = kwargs.get("where","")
        self.opt = kwargs.get("opt","")


        if(self.url == ""):
            print(self.formatURL())
            self.url = self.formatURL()

    def getRawData(self):
        url = self.url
        request = urllib.request.Request(url)
        response = urllib.request.urlopen(request)
        jsonraw = response.read().decode('utf-8')
        return jsonraw

    def getJson(self):
        jsonraw = self.getRawData()
        data = json.loads(jsonraw)
        return data

    def printJson(self):
        jsonobject = self.getJson()
        print(json.dumps(jsonobject, indent=1, sort_keys=True))

    def getData(self):
        return self.getJson()["data"]

    def printData(self):
        data = self.getData()
        print(json.dumps(data, indent=1, sort_keys=True))

    def getDBInfo(self):
        return self.getJson()["dbInfo"]

    def printDBInfo(self):
        dbinfo = self.getDBInfo()
        print(json.dumps(dbinfo, indent=1, sort_keys=True))

    def formatURL(self):
        url = self.domain+"getData.php?t="+self.table
        if(self.columns != ""):
            url = url+"&c="+self.columns

        if(self.orderby != ""):
            url = url+"&o="+self.orderby

        if(self.way != "ASC"):
            url = url+"&s="+self.way
        else:
            url = url+"&s=ASC"

        if(self.limit != ""):
            url = url+"&l="+self.limit

        if(self.where != ""):
            url = url+"&w="+urllib.parse.quote(self.where)
        if(self.opt != ""):
            url = url+"&opt="+self.opt
        return url
