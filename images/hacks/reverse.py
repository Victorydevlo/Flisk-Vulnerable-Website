
import base64
import time

def mikeSwift(cre):
    sto = []
    gre = ""
    for i in cre:
        sto.append(i + str(len(i)))
        sto.append("h4ck" + i)
    for i in sto:
        gre += i
    return gre

def prompt():
    return bytes(input("Welcome to the loading dock. What is the password?\t"), 'utf-8')

def obfuscate(bys):
    fusc = base64.b64encode(bys)
    fusc += b"534345fdfgfgfdhty6y56yjl"
    fusc = str(fusc)
    fusc = fusc[2:len(fusc)-1]
    refus = []
    for i in fusc:
        refus.append((str(i)))
    fusc = "florSFIUEfet4565477"
    for i in refus:
        fusc += i
    return fusc

def crypt(sor):
    sro = []
    fusc = "893"
    for i in range(len(sor)):
        sro.append(sor[i]+str(i))
    sro.reverse()
    for i in sro:
        fusc += i
    return fusc

def grant():
    print("✅ Congratulations! You passed the test. Onwards, hacker.")

def punish():
    print("❌ Access Denied. Try again.")
    time.sleep(2)

def main():
    sik1 = prompt()
    sik = obfuscate(sik1)
    sik = crypt(sik)
    sik = mikeSwift(sik)
    if sik == "81h4ck891h4ck931h4ck3l1h4ckl81h4ck821h4ck2j1h4ckj81h4ck811h4ck1y1h4cky81h4ck801h4ck061h4ck671h4ck791h4ck951h4ck571h4ck781h4ck8y1h4cky71h4ck771h4ck761h4ck671h4ck761h4ck6y1h4cky71h4ck751h4ck5t1h4ckt71h4ck741h4ck4h1h4ckh71h4ck731h4ck3d1h4ckd71h4ck721h4ck2f1h4ckf71h4ck711h4ck1g1h4ckg71h4ck701h4ck0f1h4ckf61h4ck691h4ck9g1h4ckg61h4ck681h4ck8f1h4ckf61h4ck671h4ck7d1h4ckd61h4ck661h4ck6f1h4ckf61h4ck651h4ck55":
        grant()
    else:
        punish()

main()
