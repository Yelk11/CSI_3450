CREATE TABLE IF NOT EXISTS AIRPORT (
    AIRPORT_ID          INTEGER NOT NULL,
    AIRPORT_NAME        CHAR(80),
    CITY                CHAR(30),
    COUNTRY             CHAR(30),
    IATA_CODE           CHAR(3),
    ICAO_CODE           CHAR(4),
    LATITUDE            VARCHAR(18),
    LONGITUDE           VARCHAR(18),
    ALTITUDE            VARCHAR(18),
    TIMEZONE_OFFSET     INTEGER,
    PRIMARY KEY (AIRPORT_ID)
);

CREATE TABLE IF NOT EXISTS AIRLINE (
    AIRLINE_ID          INTEGER NOT NULL,
    AIRPORT_ID          INTEGER NOT NULL,
    AIRLINE_NAME        CHAR(80),
    ALIAS               CHAR(20),
    IATA_CODE           CHAR(2),
    ICAO_CODE           CHAR(3),
    CALLSIGN            CHAR(10),
    COUNTRY             CHAR(30),
    ACTIVE              CHAR(1),
    PRIMARY KEY (AIRLINE_ID),
    FOREIGN KEY (AIRPORT_ID) REFERENCES AIRPORT(AIRPORT_ID)
);

CREATE TABLE IF NOT EXISTS PASSENGER (
    PASSENGER_ID        INTEGER NOT NULL,
    FIRST_NAME          CHAR(20),
    LAST_NAME           CHAR(20),
    FREQUENT_FLYER_NUMBER   INTEGER,
    TSA_PRECHECK        CHAR(1),
    EMAIL_ADDRESS       VARCHAR(20),
    PHONE_NUMBER        VARCHAR(15),
    PRIMARY KEY (PASSENGER_ID)
);

CREATE TABLE IF NOT EXISTS TICKET (
    TICKET_ID           INTEGER NOT NULL,
    PASSENGER_ID        INTEGER NOT NULL,
    CLASS               CHAR,
    GATE                VARCHAR(2),
    PRIMARY KEY (TICKET_ID),
    FOREIGN KEY (PASSENGER_ID) REFERENCES PASSENGER(PASSENGER_ID)
);

CREATE TABLE IF NOT EXISTS TERMINAL (
    TERMINAL_ID         INTEGER NOT NULL,
    AIRPORT_ID          INTEGER NOT NULL,
    NUMBER_OF_GATES     INTEGER,
    PRIMARY KEY (TERMINAL_ID),
    FOREIGN KEY (AIRPORT_ID) REFERENCES AIRPORT(AIRPORT_ID)
);

CREATE TABLE IF NOT EXISTS GATE (
    GATE_ID             INTEGER NOT NULL,
    TERMINAL_ID         INTEGER NOT NULL,
    PRIMARY KEY (GATE_ID),
    FOREIGN KEY (TERMINAL_ID) REFERENCES TERMINAL(TERMINAL_ID)
);

CREATE TABLE IF NOT EXISTS PLANE (
    PLANE_ID            INTEGER NOT NULL,
    AIRLINE_ID          INTEGER NOT NULL,
    PLANE_NAME          VARCHAR(80),
    IATA_CODE           VARCHAR(3),
    ICAO_CODE           VARCHAR(4),
    PRIMARY KEY (PLANE_ID),
    FOREIGN KEY (AIRLINE_ID) REFERENCES AIRLINE(AIRLINE_ID)
);

CREATE TABLE IF NOT EXISTS FLIGHT (
    FLIGHT_ID           INTEGER NOT NULL,
    PLANE_ID            INTEGER NOT NULL,
    DEPARTURE_TIME      TIME,
    DESTINATION         VARCHAR(20),
    BOARDING_TIME       TIME,
    SOURCE              CHAR,
    DURATION            TIME,
    PRIMARY KEY (FLIGHT_ID),
    FOREIGN KEY (PLANE_ID) REFERENCES PLANE(PLANE_ID)
);


CREATE TABLE IF NOT EXISTS FLIGHT_ATTENDANT (
    FLIGHT_ATTENDANT_ID INTEGER NOT NULL,
    HIRE_DATE           DATE,
    FIRST_NAME          CHAR(20),
    LAST_NAME           CHAR(20),
    PRIMARY KEY (FLIGHT_ATTENDANT_ID)
);

CREATE TABLE IF NOT EXISTS PILOT (
    PILOT_ID            INTEGER NOT NULL,
    HIRE_DATE           DATE,
    FIRST_NAME          CHAR(20),
    LAST_NAME           CHAR(20),
    PRIMARY KEY (PILOT_ID)
);


