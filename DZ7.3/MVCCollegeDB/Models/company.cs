namespace MVCworkorderDB.Models
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class companys
    {
        [DatabaseGenerated(DatabaseGeneratedOption.None)]
        public int id { get; set; }

        public int manager_roll_num { get; set; }

        public int location_id { get; set; }

        [Column("companys")]
        public int companys1 { get; set; }

        public virtual managers managers { get; set; }

        public virtual locations locations { get; set; }
    }
}
