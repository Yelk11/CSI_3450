BULK INSERT FLIGHT FROM "data/PLANE.dat"
WITH
    (
    FIRSTROW = 1,
    FIELDTERMINATOR = ',',  --CSV field delimiter
    ROWTERMINATOR = '\n',   --Use to shift the control to next row

    )





