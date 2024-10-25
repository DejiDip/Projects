package com.example.myapplication77.ui.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.example.myapplication77.R;
import com.example.myapplication77.ui.model.Items;

import java.util.List;

public class CustomListAdapter extends BaseAdapter {

    private Context mContext;
    private LayoutInflater inflater;
    private List<Items> itemsList;

    public CustomListAdapter(Context context, List<Items> itemsList) {
        this.mContext = context;
        this.itemsList = itemsList;
        this.inflater = LayoutInflater.from(context);
    }

    @Override
    public int getCount() {
        return itemsList.size();
    }

    @Override
    public Object getItem(int position) {
        return itemsList.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder holder;
        if (convertView == null) {
            convertView = inflater.inflate(R.layout.list_row, parent, false);
            holder = new ViewHolder();
            holder.name = convertView.findViewById(R.id.name);
            holder.score = convertView.findViewById(R.id.score);
            holder.score2 = convertView.findViewById(R.id.score2);
            holder.score3 = convertView.findViewById(R.id.score3);
            holder.date = convertView.findViewById(R.id.date);
            convertView.setTag(holder);
        } else {
            holder = (ViewHolder) convertView.getTag();
        }

        Items currentItem = itemsList.get(position);
        holder.name.setText(currentItem.getName());
        holder.score.setText(currentItem.getScore());
        holder.score2.setText(currentItem.getScore2());
        holder.score3.setText(currentItem.getScore3());
        holder.date.setText(currentItem.getDate());
        return convertView;
    }

    static class ViewHolder {
        TextView name;
        TextView score;
        TextView score2;
        TextView score3;
        TextView date;

    }
}

