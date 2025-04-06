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
    if sik == "81h4ck891h4ck931h4ck3l1h4ckl51h4ck541h4ck4j1h4ckj51h4ck531h4ck3y1h4cky51h4ck521h4ck261h4ck651h4ck511h4ck151h4ck551h4ck501h4ck0y1h4cky41h4ck491h4ck961h4ck641h4ck481h4ck8y1h4cky41h4ck471h4ck7t1h4ckt41h4ck461h4ck6h1h4ckh41h4ck451h4ck5d1h4ckd41h4ck441h4ck4f1h4ckf41h4ck431h4ck3g1h4ckg41h4ck421h4ck2f1h4ckf41h4ck411h4ck1g1h4ckg41h4ck401h4ck0f1h4ckf31h4ck391h4ck9d1h4ckd31h4ck381h4ck8f1h4ckf31h4ck371h4ck751h4ck531h4ck361h4ck641h4ck431h4ck351h4ck531h4ck331h4ck341h4ck441h4ck431h4ck331h4ck331h4ck331h4ck321h4ck251h4ck531h4ck311h4ck191h4ck931h4ck301h4ck0N1h4ckN21h4ck291h4ck9X1h4ckX21h4ck281h4ck8Z1h4ckZ21h4ck271h4ck751h4ck521h4ck261h4ck6t1h4ckt21h4ck251h4ck531h4ck321h4ck241h4ck4Z1h4ckZ21h4ck231h4ck3h1h4ckh21h4ck221h4ck2x1h4ckx21h4ck211h4ck1m1h4ckm21h4ck201h4ck0Z1h4ckZ11h4ck191h4ck971h4ck711h4ck181h4ck871h4ck711h4ck171h4ck741h4ck411h4ck161h4ck651h4ck511h4ck151h4ck561h4ck611h4ck141h4ck451h4ck511h4ck131h4ck341h4ck411h4ck121h4ck2t1h4ckt11h4ck111h4ck1e1h4cke11h4ck101h4ck0f1h4ckf91h4ck9E1h4ckE81h4ck8U1h4ckU71h4ck7I1h4ckI61h4ck6F1h4ckF51h4ck5S1h4ckS41h4ck4r1h4ckr31h4ck3o1h4cko21h4ck2l1h4ckl11h4ck1f1h4ckf01h4ck0":
        grant()
    else:
        punish()

main()
