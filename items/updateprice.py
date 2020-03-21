import requests
from bs4 import BeautifulSoup

urlin1 = "https://geizhals.de/be-quiet-pure-base-600-schwarz-bg021-a1559571.html"
filenamein1 = 'case0.html'
urlin2 = "https://geizhals.de/be-quiet-pure-base-500-schwarz-bgw34-a2126924.html"
filenamein2 = 'case1.html'
urlin3 = "https://geizhals.de/amd-ryzen-5-3600-100-100000031box-a2064574.html"
filenamein3 = 'cpu0.html'
urlin4 = "https://geizhals.de/intel-core-i9-9900k-bx80684i99900k-a1870092.html"
filenamein4 = 'cpu2.html'
urlin5 = "https://geizhals.de/intel-core-i7-9700k-bx80684i79700k-a1870100.html"
filenamein5 = 'cpu3.html'
urlin6 = "https://geizhals.de/intel-core-i5-9400f-bx80684i59400f-a1968119.html"
filenamein6 = 'cpu4.html'
urlin7 = "https://geizhals.de/scythe-mugen-5-rev-b-scmg-5100-a1647533.html"
filenamein7 = 'fan0.html'
urlin8 = "https://geizhals.de/be-quiet-pure-rock-bk009-a1184606.html"
filenamein8 = 'fan1.html'
urlin9 = "https://geizhals.de/kfa2-geforce-rtx-2070-super-ex-1-click-oc-27isl6mdu9ek-a2091310.html"
filenamein9 = 'gpu0.html'
urlin10 = "https://geizhals.de/western-digital-wd-red-4tb-wd40efrx-a992027.html"
filenamein10 = 'hdd0.html'
urlin11 = "https://geizhals.de/western-digital-wd-blue-1tb-wd10ezex-a795106.html"
filenamein11 = 'hdd1.html'
urlin12 = "https://geizhals.de/lenovo-ideapad-s340-15api-platinum-gray-81nc00dbge-a2139674.html"
filenamein12 = 'lap0.html'
urlin13 = "https://geizhals.de/apple-macbook-pro-16-space-gray-mvvk2d-a-a2177728.html"
filenamein13 = 'lap1.html'
urlin14 = "https://geizhals.de/asus-zenbook-14-um431da-am020-utopia-blue-90nb0pb3-m02300-a2209600.html"
filenamein14 = 'lap2.html'
urlin15 = "https://geizhals.de/g-skill-trident-z-neo-dimm-kit-32gb-f4-3600c16d-32gtznc-a2099456.html"
filenamein15 = 'ram1.html'
urlin16 = "https://geizhals.de/corsair-vengeance-rgb-pro-schwarz-dimm-kit-16gb-cmw16gx4m2c3200c16-a1828434.html"
filenamein16 = 'ram2.html'

def updateprice(urlin, filenamein):
    url = urlin
    filename = filenamein
    response = requests.get(url)
    soup = BeautifulSoup(response.text, "html.parser")
    gg = soup.find('span', {'class' : 'gh_price'})
    gg = '{}'.format(gg)
    price = gg.replace('€', '&euro;')
    price = price.replace('<span class="gh_price">', '')
    price = price.replace('</span>', '')

    with open(filename, 'r') as f:
        rr = f.read()
        soup = BeautifulSoup(rr, "html.parser")
        tag = soup.find('p', {'id' : 'price'})
        tag = '{}'.format(tag)
        tag = tag.replace('€', '&euro;')
        newtag = '<p id="price">Preis: {}</p>'.format(price)
        filedata = rr
        filedata2 = rr.replace(tag, newtag)
        f.close()

    temp = '{}'.format(filedata2)
    if newtag == 'None':
        break

    with open(filename, 'w') as g:
        g.write(temp)
        g.close

    time.sleep(5)
            
updateprice(urlin1, filenamein1)
updateprice(urlin2, filenamein2)
updateprice(urlin3, filenamein3)
updateprice(urlin4, filenamein4)
updateprice(urlin5, filenamein5)
updateprice(urlin6, filenamein6)
updateprice(urlin7, filenamein7)
updateprice(urlin8, filenamein8)
updateprice(urlin9, filenamein9)
updateprice(urlin10, filenamein10)
updateprice(urlin11, filenamein11)
updateprice(urlin12, filenamein12)
updateprice(urlin13, filenamein13)
updateprice(urlin14, filenamein14)
updateprice(urlin15, filenamein15)
updateprice(urlin16, filenamein16)
