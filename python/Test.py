import math
from datetime import time
from datetime import date
from datetime import datetime
import urllib.request
import json
from html.parser import HTMLParser


class NyHTMLParser(HTMLParser):
    def handle_comment(self, data):
        print("Comment:", data)
        pos = self.getpos()
        print("At line: ", pos[0])


today = date.today()
print("Today's date is ", today)
print(today.day, today.month, today.year)
print(today.weekday())
today = datetime.now()
print("Today's date is ", today)
print(today.strftime("Current year is %Y "))

print(math.ceil(0.1))
print(math.pi)
print("---------- demo --------")
(2 + 3 * 6 / 2) * 1
print("Programs tend to have bugs")

name = "Interpretive lang -> -> "

age = 36

print(age)

print(type(age))

print("Someone programmed this code")

2 + 3

2 * 3

2 ** 3

3 / 2

3 // 2

5 % 3

45000 / 5

0.2 + 0.3

0.2 / 0.3

name = input("Whats's your name ? ")
if name == "python":
    print("That's good to hear !")
    print("Line 2")
    print("Line 3")
else:
    print("That makes me sad!")
print("Thanx!")

# Include comments


solution = input("How much is 2+5?")
if solution == "7":
    solution = input("How much is 1+1?")
    if solution == "2":
        print("You win a new car!")
print("Game Over")
print("Thanx for playing!")


def swimm():
    print("Swimming")
    print("Swimming")


swimm()
swimm()
swimm()


class myClass:
    def method1(self):
        print("Method1")


def main():
    x = 0
    while x <= 5:
        if x == 5:
            print(x)
        elif x == 0:
            print(0)
        else:
            print("-")
        x = x + 1

    for x in range(5, 10):
        print(x)

    days = ["Mon", "Tue"]
    for d in days:
        print(d)

    for i, d in enumerate(days):
        print(i, d)

    for x in range(10, 20):
        if x % 2:
            continue
        if x == 18:
            print("Break")

            break
        print(x)

    c = myClass()
    c.method1()

    webUrl = urllib.request.urlopen(
        "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson"
    )
    print("result code: " + str(webUrl.getcode()))

    data = webUrl.read()
    printResults(data)
    # print(data)

    # parser = MyHTMLParser ()
    # f = open ("sample.html")
    # if f.mode == "r":
    #    contents = f.read()
    #    parser.feed(contents)


def printResults(data):
    theJSON = json.loads(data)
    if "title" in theJSON["metadata"]:
        print(theJSON["metadata"]["title"])

    for i in theJSON["features"]:
        print(i["properties"]["place"])


if __name__ == "__main__":
    main()