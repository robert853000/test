# What Is an Algorithm ?

# Complexcity
#  * space complexisty: how much memory
#  * Time complexity: How much time does
# Inputs and outputs

# Classification
#  * Serial/parallel, exact/approtxe,
#   deterministic/non-deter


# Sorthing algorithm

# Search algorithms, Sorting algorithms, Computational alg.. , Collection algo..


# Euclid's Algorithm
# Find the greatest common denominator of two int

# Constant time
# Logarithmoc time
# Linear time
# Log Linear
# Quadratic --

# The bobble sort, The mergle sort, The quicksort


def power(num, pwr):
    if pwr == 0:
        return 1
    else:
        return num * power(num, pwr - 1)


def factorial(num):
    if num == 0:
        return 1
    else:
        return num * factorial(num - 1)


def gcd(a, b):
    # exact deterministic algorithm
    while b != 0:
        t = a
        a = b
        b = t % b

    return a


isOnRepeat = True
showMenu = True

while showMenu:
    print("\033c")
    print("Tasks")
    print("1 - Find the greatest common denominator")
    print("2 - Power and Factorial")
    print("0 - Exit")

    menuAnswer = input("Your choice: ")
    if menuAnswer == "1":
        while isOnRepeat:
            print("\033c")
            print("Find the greatest common denominator of two integers")
            num1 = int(input("Enter numer 1: "))
            num2 = int(input("Enter numer 2: "))
            print("Result is: ")
            print(gcd(num1, num2))
            quitAnswer = input("Quit? (y/n)")
            if quitAnswer == "y":
                isOnRepeat = False
    if menuAnswer == "2":
        print("\033c")
        print("Power and Factorial")
        print("1. - Power")
        print("2. - Factorial")
        menuAnswer = input("Your choice: ")

        if menuAnswer == "1":
            print("\033c")
            print("PoW ----------------")

            num1 = int(input("numer: "))
            pow1 = int(input("pow: "))

            print("{} to the power of {} is {}".format(num1, pow1, power(num1, pow1)))
        elif menuAnswer == "2":
            print("\033c")
            print("Factorial ----------")

            num1 = int(input("numer: "))

            print("{}! is {}".format(num1, factorial(num1)))

        else:
            print("unknown choice")

        input1 = input("Press any key to continue ...")

    elif menuAnswer == "0":
        showMenu = False

    else:
        print(",,")
