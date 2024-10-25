package com.example.myapplication77;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

public class DBHelper extends SQLiteOpenHelper {
    private static final int DATABASE_VERSION = 2;

    public DBHelper(@Nullable Context context, @Nullable String name, @Nullable SQLiteDatabase.CursorFactory factory, int version) {
        super(context, name, null, 1);
    }


    @Override
    public void onCreate(SQLiteDatabase db) {
        // Create initial table
        db.execSQL("CREATE TABLE IF NOT EXISTS scores (name TEXT, score TEXT, score2 TEXT, score3 TEXT, date TEXT);");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // Handle upgrades from version to version
        for (int version = oldVersion + 1; version <= newVersion; version++) {
            switch (version) {
                case 2:
                    // Add the new column
                    db.execSQL("ALTER TABLE scores ADD COLUMN score2 TEXT");
                    break;
            }
        }
    }
    // This method to clear all rows from the 'scores' table
    public void clearDatabase() {
        SQLiteDatabase db = this.getWritableDatabase();
        db.delete("scores", null, null);
        db.close();
    }
}